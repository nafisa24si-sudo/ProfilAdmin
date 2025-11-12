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
    public function index()
    {
        // Gunakan paginate agar bisa pakai $berita->links() di Blade
        $berita = Berita::with('kategori')->latest()->paginate(10);
        return view('pages.berita.index', compact('berita'));
    }

    /**
     * Tampilkan form tambah berita.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('pages.berita.create', compact('kategori'));
    }

    /**
     * Simpan berita baru.
     */
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

    /**
     * Tampilkan form edit berita.
     */
    public function edit(Berita $berita)
    {
        $kategori = Kategori::all();
        return view('pages.berita.form', compact('berita', 'kategori'));
    }

    /**
     * Update data berita.
     */
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

    /**
     * Hapus berita.
     */
    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
