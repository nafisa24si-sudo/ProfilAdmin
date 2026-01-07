<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Tampilkan daftar berita
     */
    public function index(Request $request)
    {
        $filterableColumns = ['kategori_id', 'status'];
        $searchableColumns = ['judul', 'isi_html', 'penulis'];

        $query = Berita::with(['kategori', 'mediaFiles']);

        // Filter
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->$column);
            }
        }

        // Search
        $query = $query->search($request, $searchableColumns);

        $berita = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $kategori = Kategori::all();

        return view('pages.berita.index', compact('berita', 'kategori'));
    }

    /**
     * Form tambah berita
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('pages.berita.create', compact('kategori'));
    }

    /**
     * Simpan berita baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_berita,id',
            'isi_html' => 'required',
            'penulis' => 'nullable|string|max:100',
            'status' => 'nullable|in:draft,published',
            'terbit_at' => 'nullable|date',
            'cover' => 'nullable|string|max:255',
            'media_files' => 'nullable|array',
            'media_files.*' => 'file|max:10240',
            'media_captions' => 'nullable|array',
        ]);

        // ===== GENERATE SLUG =====
        $slug = Str::slug($validated['judul']);
        $originalSlug = $slug;
        $counter = 1;

        while (Berita::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $validated['slug'] = $slug;

        // Simpan berita
        $berita = Berita::create($validated);

        // Upload media
        if ($request->hasFile('media_files')) {
            $this->uploadMediaFiles($request, $berita->id);
        }

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Form edit berita
     */
    public function edit(Berita $berita)
    {
        $kategori = Kategori::all();
        return view('pages.berita.edit', compact('berita', 'kategori'));
    }

    /**
     * Update berita
     */
    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_berita,id',
            'isi_html' => 'required',
            'penulis' => 'nullable|string|max:100',
            'status' => 'nullable|in:draft,published',
            'terbit_at' => 'nullable|date',
            'cover' => 'nullable|string|max:255',
            'media_files' => 'nullable|array',
            'media_files.*' => 'file|max:10240',
            'media_captions' => 'nullable|array',
        ]);

        // Update slug jika judul berubah
        if ($validated['judul'] !== $berita->judul) {
            $slug = Str::slug($validated['judul']);
            $originalSlug = $slug;
            $counter = 1;

            while (
                Berita::where('slug', $slug)
                    ->where('id', '!=', $berita->id)
                    ->exists()
            ) {
                $slug = $originalSlug . '-' . $counter++;
            }

            $validated['slug'] = $slug;
        }

        $berita->update($validated);

        if ($request->hasFile('media_files')) {
            $this->uploadMediaFiles($request, $berita->id);
        }

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Hapus berita
     */
    public function destroy(Berita $berita)
    {
        // Hapus media terkait
        foreach ($berita->mediaFiles as $media) {
            if (Storage::disk('public')->exists('media/' . $media->file_name)) {
                Storage::disk('public')->delete('media/' . $media->file_name);
            }
            $media->delete();
        }

        $berita->delete();

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    /**
     * Upload media files
     */
    private function uploadMediaFiles(Request $request, int $beritaId): void
    {
        $files = $request->file('media_files', []);
        $captions = $request->input('media_captions', []);

        foreach ($files as $index => $file) {
            if ($file && $file->isValid()) {
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

                $file->storeAs('media', $filename, 'public');

                Media::create([
                    'ref_table' => 'berita',
                    'ref_id' => $beritaId,
                    'file_name' => $filename,
                    'caption' => $captions[$index] ?? null,
                    'mime_type' => $file->getMimeType(),
                    'sort_order' => $index,
                ]);
            }
        }
    }

    /**
     * Hapus media tertentu
     */
    public function deleteMedia(int $mediaId)
    {
        $media = Media::findOrFail($mediaId);

        if (Storage::disk('public')->exists('media/' . $media->file_name)) {
            Storage::disk('public')->delete('media/' . $media->file_name);
        }

        $beritaId = $media->ref_id;
        $media->delete();

        return redirect()
            ->route('berita.edit', $beritaId)
            ->with('success', 'Media berhasil dihapus.');
    }
}
