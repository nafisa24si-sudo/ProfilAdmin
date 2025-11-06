<?php

namespace App\Http\Controllers;

use App\Models\Warga; // Pastikan import model Warga
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $wargas = Warga::paginate(10); // Gunakan pagination, bukan first()
        return view('pages.warga.index', compact('wargas'));
    }

    public function create()
    {
        return view('pages.warga.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|unique:wargas,email',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:15',
            // Tambahkan field lainnya sesuai kebutuhan
        ]);

        Warga::create($validated);

        return redirect()->route('warga.index')
                         ->with('success', 'Data warga berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('pages.warga.edit', compact('warga'));
    }

    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|unique:wargas,email,' . $id,
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:15',
        ]);

        $warga->update($validated);

        return redirect()->route('warga.index')
                         ->with('success', 'Data warga berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();

        return redirect()->route('warga.index')
                         ->with('success', 'Data warga berhasil dihapus.');
    }
}
