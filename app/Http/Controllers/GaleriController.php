<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::orderBy('created_at', 'desc')->paginate(50);
        return view('pages.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('pages.galeri.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $validated['foto'] = $request->file('foto')->store('galeri-photos', 'public');

        Galeri::create($validated);

        return redirect()->route('galeri.index')->with('success', 'Foto berhasil ditambahkan ke galeri.');
    }

    public function show(Galeri $galeri)
    {
        return view('pages.galeri.show', compact('galeri'));
    }

    public function edit(Galeri $galeri)
    {
        return view('pages.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($galeri->foto);
            $validated['foto'] = $request->file('foto')->store('galeri-photos', 'public');
        }

        $galeri->update($validated);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        Storage::disk('public')->delete($galeri->foto);
        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Foto berhasil dihapus dari galeri.');
    }
}