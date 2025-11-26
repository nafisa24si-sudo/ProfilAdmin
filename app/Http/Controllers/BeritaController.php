<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kategori;

class BeritaController extends Controller
{
    /**
     * Tampilkan daftar berita.
     */
    public function index(Request $request)
    {
        // Log akses untuk debugging: memastikan method dipanggil
        \Log::info('BeritaController@index dipanggil', ['request' => $request->all()]);
        // Kolom yang bisa di-filter
        $filterableColumns = ['kategori_id', 'status', 'penulis'];

        // Kolom yang akan dipakai untuk fitur pencarian (search)
        $searchableColumns = ['judul', 'isi_html', 'penulis'];
        
        // Query dengan filter dan pagination (hindari pemanggilan scope yang gagal)
        $beritaQuery = Berita::with('kategori');
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $beritaQuery->where($column, $request->input($column));
            }
        }

        // Terapkan search (jika ada) menggunakan scopeSearch di model
        $beritaQuery = $beritaQuery->search($request, $searchableColumns);

        $berita = $beritaQuery
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $kategori = Kategori::all();
        
        // Dapatkan daftar penulis unik untuk dropdown filter
        $authors = Berita::whereNotNull('penulis')
            ->distinct()
            ->pluck('penulis')
            ->filter()
            ->sort()
            ->values();

        \Log::info('BeritaController@index data', [
            'kategori_count' => $kategori->count(),
            'berita_count' => $berita->total(),
            'authors_count' => $authors->count(),
        ]);

        return view('pages.berita.index', compact('berita', 'kategori', 'authors'));
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
        ]);

        Berita::create($validated);

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
        ]);

        $berita->update($validated);

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
}