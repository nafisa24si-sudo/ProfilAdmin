<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Tampilkan daftar berita.
     */
    public function index(Request $request)
    {
      
        \Log::info('BeritaController@index dipanggil', ['request' => $request->all()]);
    
        $filterableColumns = ['kategori_id', 'status'];

        
        $searchableColumns = ['judul', 'isi_html', 'penulis'];
        
       
        $beritaQuery = Berita::with('kategori', 'mediaFiles');
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $beritaQuery->where($column, $request->input($column));
            }
        }

    
        $beritaQuery = $beritaQuery->search($request, $searchableColumns);

        $berita = $beritaQuery
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $kategori = Kategori::all();
        
        return view('pages.berita.index', compact('berita', 'kategori'));
    }

    // Method lainnya tetap sama...
    public function create()
    {
        $kategori = Kategori::all();
        return view('pages.berita.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'isi_html' => 'required',
            'penulis' => 'nullable|string|max:100',
            'status' => 'nullable|in:draft,published',
            'terbit_at' => 'nullable|date',
            'cover' => 'nullable|string|max:255',
            'media_files' => 'nullable|array',
            'media_files.*' => 'file|max:10240',
            'media_captions' => 'nullable|array',
        ]);

        // Buat berita
        $berita = Berita::create($validated);

        // Handle media files upload
        if ($request->hasFile('media_files')) {
            $this->uploadMediaFiles($request, $berita->id);
        }

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        $kategori = Kategori::all();
        return view('pages.berita.form', compact('berita', 'kategori'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'isi_html' => 'required',
            'penulis' => 'nullable|string|max:100',
            'status' => 'nullable|in:draft,published',
            'terbit_at' => 'nullable|date',
            'cover' => 'nullable|string|max:255',
            'media_files' => 'nullable|array',
            'media_files.*' => 'file|max:10240',
            'media_captions' => 'nullable|array',
        ]);

        $berita->update($validated);

        // Handle media files upload
        if ($request->hasFile('media_files')) {
            $this->uploadMediaFiles($request, $berita->id);
        }

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    /**
     * Upload media files dan simpan ke database
     * 
     * @param Request $request
     * @param int $beritaId
     * @return void
     */
    private function uploadMediaFiles(Request $request, int $beritaId)
    {
        $files = $request->file('media_files', []);
        $captions = $request->input('media_captions', []);

        foreach ($files as $index => $file) {
            if ($file && $file->isValid()) {
                try {
                    // Generate nama file unik
                    $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                    
                    // Store file ke storage/media
                    $path = $file->storeAs('media', $filename, 'public');
                    
                    // Dapatkan MIME type
                    $mimeType = $file->getMimeType();
                    
                    // Dapatkan caption jika ada
                    $caption = $captions[$index] ?? null;
                    
                    // Simpan ke tabel media
                    Media::create([
                        'ref_table' => 'berita',
                        'ref_id' => $beritaId,
                        'file_name' => $filename,
                        'caption' => $caption,
                        'mime_type' => $mimeType,
                        'sort_order' => $index,
                    ]);
                    
                    \Log::info('Media file uploaded successfully', [
                        'filename' => $filename,
                        'ref_id' => $beritaId,
                        'mime_type' => $mimeType,
                    ]);
                } catch (\Exception $e) {
                    \Log::error('Media upload error', [
                        'error' => $e->getMessage(),
                        'file' => $file->getClientOriginalName(),
                    ]);
                }
            }
        }
    }

    /**
     * Hapus media file
     * 
     * @param int $mediaId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteMedia($mediaId)
    {
        try {
            $media = Media::findOrFail($mediaId);
            $beritaId = $media->ref_id;
            
            // Hapus file dari storage
            if (Storage::disk('public')->exists('media/' . $media->file_name)) {
                Storage::disk('public')->delete('media/' . $media->file_name);
            }
            
            // Hapus record dari database
            $media->delete();
            
            \Log::info('Media file deleted', ['media_id' => $mediaId, 'filename' => $media->file_name]);
            
            return redirect()
                ->route('berita.edit', $beritaId)
                ->with('success', 'File media berhasil dihapus.');
        } catch (\Exception $e) {
            \Log::error('Media delete error', ['error' => $e->getMessage()]);
            return redirect()
                ->back()
                ->with('error', 'Gagal menghapus file media.');
        }
    }
}