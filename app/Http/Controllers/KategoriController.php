<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Tampilkan daftar kategori.
     */
    public function index()
    {
        $kategoris = Kategori::latest()->paginate(10);
        return view('pages.kategori.index', compact('kategoris'));
    }

    /**
     * Tampilkan form tambah kategori baru.
     */
    public function create()
    {
        return view('pages.kategori.create');
    }

    /**
     * Simpan data kategori baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255|unique:kategoris,nama',
            'deskripsi' => 'nullable|string',
        ]);

        Kategori::create([
            'nama' => $validated['nama'],
            'slug' => Str::slug($validated['nama']),
            'deskripsi' => $validated['deskripsi'] ?? null,
        ]);

        return redirect()
            ->route('pages.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit kategori.
     */
    public function edit(Kategori $kategori)
    {
        return view('pages.kategori.edit', compact('kategori'));
    }

    /**
     * Update data kategori yang sudah ada.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255|unique:kategoris,nama,' . $kategori->id,
            'deskripsi' => 'nullable|string',
        ]);

        $kategori->update([
            'nama' => $validated['nama'],
            'slug' => Str::slug($validated['nama']),
            'deskripsi' => $validated['deskripsi'] ?? null,
        ]);

        return redirect()
            ->route('pages.kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Hapus kategori.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()
            ->route('pages.kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
