<?php

namespace App\Http\Controllers;

use App\Models\ProfilDesa;
use Illuminate\Http\Request;

class ProfilDesaController extends Controller
{
    public function index()
    {
        $profil = ProfilDesa::first();
        return view('pages.profil.index', compact('profil'));
    }

    public function create()
    {
        return view('pages.profil.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_desa' => 'required|string|max:255',
            'telepon' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'alamat' => 'nullable|string|max:255',
            'sejarah_singkat' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'peta_embed_url' => 'nullable|string',
        ]);

        // Hapus data lama agar hanya 1 profil
        ProfilDesa::truncate();
        ProfilDesa::create($validated);

        return redirect()->route('profil.index')->with('success', 'Profil desa berhasil disimpan.');
    }

    public function edit($id)
    {
        $profil = ProfilDesa::findOrFail($id);
        return view('pages.profil.edit', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_desa' => 'required|string|max:255',
            'telepon' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'alamat' => 'nullable|string|max:255',
            'sejarah_singkat' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'peta_embed_url' => 'nullable|string',
        ]);

        $profil = ProfilDesa::findOrFail($id);
        $profil->update($validated);

        return redirect()->route('pages.profil.index')->with('success', 'Profil desa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $profil = ProfilDesa::findOrFail($id);
        $profil->delete();

        return redirect()->route('pages.profil.index')->with('success', 'Profil desa berhasil dihapus.');
    }
}
