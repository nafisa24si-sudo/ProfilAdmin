<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $profil = User::first();
        return view('pages.user.index', compact('user'));
    }

    public function create()
    {
        return view('pages.user.create');
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
        User::truncate();
        User::create($validated);

        return redirect()->route('pages.user.index')->with('success', 'user desa berhasil disimpan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.edit', compact('user'));
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

        $profil = User::findOrFail($id);
        $profil->update($validated);

        return redirect()->route('pages.user.index')->with('success', 'user desa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('pages.user.index')->with('success', 'user desa berhasil dihapus.');
    }
}
