<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

class GaleriController extends Controller
{
    public function index()
    {
        $primary = (new Galeri())->getKeyName();
        $galeris = Galeri::orderBy($primary, 'desc')->paginate(12);
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

        if ($request->hasFile('foto')) {
            // Logging upload info
            try {
                $file = $request->file('foto');
                Log::info('Galeri upload attempt', ['name' => $file->getClientOriginalName(), 'size' => $file->getSize()]);
            } catch (\Throwable $e) {
                Log::warning('Galeri upload: failed to read file info: ' . $e->getMessage());
            }

            $validated['foto'] = $request->file('foto')->store('galeri-photos', 'public');
            Log::info('Galeri file stored', ['path' => $validated['foto']]);
        }

        try {
            Galeri::create($validated);
            return redirect()->route('galeri.index')->with('success', 'Foto berhasil ditambahkan ke galeri.');
        } catch (\Exception $e) {
            Log::error('Galeri store error: ' . $e->getMessage(), ['validated' => $validated]);
            return back()->with('error', 'Gagal menambahkan foto. Error: ' . $e->getMessage())->withInput();
        }
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
            if (!empty($galeri->foto) && Storage::disk('public')->exists($galeri->foto)) {
                Storage::disk('public')->delete($galeri->foto);
            }
            $validated['foto'] = $request->file('foto')->store('galeri-photos', 'public');
        }

        // Filter validated to actual DB columns
        $cols = Schema::getColumnListing('galeri');
        $validated = array_intersect_key($validated, array_flip($cols));

        try {
            $galeri->update($validated);
            return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Galeri update error: ' . $e->getMessage(), ['galeri_id' => $galeri->galeri_id, 'validated' => $validated]);
            return back()->with('error', 'Gagal memperbarui galeri. Periksa log.')->withInput();
        }
    }

    public function destroy(Galeri $galeri)
    {
        if (!empty($galeri->foto) && Storage::disk('public')->exists($galeri->foto)) {
            Storage::disk('public')->delete($galeri->foto);
        }
        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Foto berhasil dihapus dari galeri.');
    }
}