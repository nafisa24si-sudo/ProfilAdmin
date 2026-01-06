<?php

namespace App\Http\Controllers;

use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

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

        // Hanya simpan kolom yang benar-benar ada di tabel database
        $cols = Schema::getColumnListing('profil_desa');
        $validated = array_intersect_key($validated, array_flip($cols));

        try {
            // Hapus data lama agar hanya 1 profil
            ProfilDesa::truncate();
            ProfilDesa::create($validated);
            return redirect()->route('profil.index')->with('success', 'Profil desa berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error('ProfilDesa store error: ' . $e->getMessage(), ['validated' => $validated]);
            return back()->with('error', 'Gagal menyimpan profil desa. Periksa log untuk detail.')->withInput();
        }
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
        // Filter validated keys supaya hanya kolom yang ada di DB yang diupdate
        $cols = Schema::getColumnListing('profil_desa');
        $validated = array_intersect_key($validated, array_flip($cols));

        try {
            $profil = ProfilDesa::findOrFail($id);
            $profil->update($validated);
            return redirect()->route('profil.index')->with('success', 'Profil desa berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('ProfilDesa update error: ' . $e->getMessage(), ['id' => $id, 'validated' => $validated]);
            return back()->with('error', 'Gagal memperbarui profil desa. Periksa log untuk detail.')->withInput();
        }
    }

    public function destroy($id)
    {
        $profil = ProfilDesa::findOrFail($id);
        $profil->delete();

        return redirect()->route('profil.index')->with('success', 'Profil desa berhasil dihapus.');
    }
}
