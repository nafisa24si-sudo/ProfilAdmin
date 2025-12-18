<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function index()
    {
        $developers = Developer::latest()->get();
        return view('pages.developer.index', compact('developers'));
    }

    public function create()
    {
        return view('pages.developer.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'nullable|email',
            'github' => 'nullable|url',
            'linkedin' => 'nullable|url'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/developers'), $filename);
            $validated['foto'] = $filename;
        }

        Developer::create($validated);

        return redirect()->route('developer.index')->with('success', 'Developer berhasil ditambahkan!');
    }

    public function edit(Developer $developer)
    {
        return view('pages.developer.edit', compact('developer'));
    }

    public function update(Request $request, Developer $developer)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'nullable|email',
            'github' => 'nullable|url',
            'linkedin' => 'nullable|url'
        ]);

        if ($request->hasFile('foto')) {
            if ($developer->foto && file_exists(public_path('images/developers/' . $developer->foto))) {
                unlink(public_path('images/developers/' . $developer->foto));
            }
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/developers'), $filename);
            $validated['foto'] = $filename;
        }

        $developer->update($validated);

        return redirect()->route('developer.index')->with('success', 'Developer berhasil diupdate!');
    }

    public function destroy(Developer $developer)
    {
        if ($developer->foto && file_exists(public_path('images/developers/' . $developer->foto))) {
            unlink(public_path('images/developers/' . $developer->foto));
        }
        $developer->delete();

        return redirect()->route('developer.index')->with('success', 'Developer berhasil dihapus!');
    }
}
