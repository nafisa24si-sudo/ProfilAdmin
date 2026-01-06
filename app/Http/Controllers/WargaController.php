<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WargaController extends Controller
{
    /**
     * Menampilkan semua data warga
     */
    public function index()
    {
        // Buat data dummy jika tidak ada data
        if (Warga::count() === 0) {
            $this->createDummyData();
        }

        $wargas = Warga::orderBy('nama')->paginate(50);
        
        return view('pages.warga.index', compact('wargas'));
    }

    /**
     * Menampilkan form tambah warga
     */
    public function create()
    {
        return view('pages.warga.create');
    }

    /**
     * Menyimpan data warga baru
     */
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'nik' => 'required|string|size:16|unique:warga,nik',
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'nullable|string|max:50',
            'tanggal_lahir' => 'nullable|date',
            'agama' => 'nullable|string|max:20',
            'status_perkawinan' => 'nullable|in:Belum Kawin,Kawin,Cerai',
            'pekerjaan' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
            'rt' => 'nullable|string|max:3',
            'rw' => 'nullable|string|max:3',
            'status_warga' => 'required|in:Tetap,Kontrak/Kos,Pendatang',
            'status_hidup' => 'required|in:Hidup,Meninggal',
        ]);

        try {
            // Simpan data
            Warga::create($validated);

            return redirect()->route('warga.index')
                ->with('success', 'Data warga berhasil ditambahkan.');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menambah data: ' . $e->getMessage())
                        ->withInput();
        }
    }

    /**
     * Menampilkan detail warga
     */
    public function show($id)
    {
        try {
            $warga = Warga::findOrFail($id);
            return view('pages.warga.show', compact('warga'));

        } catch (\Exception $e) {
            return redirect()->route('warga.index')
                ->with('error', 'Data warga tidak ditemukan.');
        }
    }

    /**
     * Menampilkan form edit warga
     */
    public function edit($id)
    {
        try {
            $warga = Warga::findOrFail($id);
            return view('pages.warga.edit', compact('warga'));

        } catch (\Exception $e) {
            return redirect()->route('warga.index')
                ->with('error', 'Data warga tidak ditemukan.');
        }
    }

    /**
     * Update data warga
     */
    public function update(Request $request, $id)
    {
        try {
            $warga = Warga::findOrFail($id);

            // Validasi data
            $validated = $request->validate([
                    'nik' => 'required|string|size:16|unique:warga,nik,' . $id . ',id_warga',
                'nama' => 'required|string|max:100',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                'tempat_lahir' => 'nullable|string|max:50',
                'tanggal_lahir' => 'nullable|date',
                'agama' => 'nullable|string|max:20',
                'status_perkawinan' => 'nullable|in:Belum Kawin,Kawin,Cerai',
                'pekerjaan' => 'nullable|string|max:50',
                'alamat' => 'nullable|string',
                'rt' => 'nullable|string|max:3',
                'rw' => 'nullable|string|max:3',
                'status_warga' => 'required|in:Tetap,Kontrak/Kos,Pendatang',
                'status_hidup' => 'required|in:Hidup,Meninggal',
            ]);

            // Update data
            $warga->update($validated);

            return redirect()->route('warga.index')
                ->with('success', 'Data warga berhasil diperbarui.');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage())
                        ->withInput();
        }
    }

    /**
     * Hapus data warga
     */
    public function destroy($id)
    {
        try {
            $warga = Warga::findOrFail($id);
            $nama = $warga->nama;
            $warga->delete();

            return redirect()->route('warga.index')
                ->with('success', 'Data warga ' . $nama . ' berhasil dihapus.');

        } catch (\Exception $e) {
            return redirect()->route('warga.index')
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    /**
     * Pencarian data warga
     */
    public function search(Request $request)
    {
        $search = $request->get('search');

        $wargas = Warga::where('nama', 'like', '%' . $search . '%')
                      ->orWhere('nik', 'like', '%' . $search . '%')
                      ->orWhere('alamat', 'like', '%' . $search . '%')
                      ->orderBy('nama')
                      ->paginate(10);

        return view('pages.warga.index', compact('wargas', 'search'));
    }

    /**
     * Membuat data dummy untuk testing
     */
    private function createDummyData()
    {
        $dummyData = [
            [
                'nik' => '3273010101010001',
                'nama' => 'Ahmad Santoso',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1985-05-15',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Wiraswasta',
                'alamat' => 'Jl. Merdeka No. 123 RT 001/RW 002',
                'rt' => '001',
                'rw' => '002',
                'status_warga' => 'Tetap',
                'status_hidup' => 'Hidup',
            ],
            [
                'nik' => '3273010101010002',
                'nama' => 'Siti Rahayu',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1990-08-20',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Guru',
                'alamat' => 'Jl. Pendidikan No. 45 RT 002/RW 002',
                'rt' => '002',
                'rw' => '002',
                'status_warga' => 'Tetap',
                'status_hidup' => 'Hidup',
            ],
            [
                'nik' => '3273010101010003',
                'nama' => 'Budi Prasetyo',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1992-12-10',
                'agama' => 'Kristen',
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Programmer',
                'alamat' => 'Jl. Teknologi No. 78 RT 003/RW 002',
                'rt' => '003',
                'rw' => '002',
                'status_warga' => 'Kontrak/Kos',
                'status_hidup' => 'Hidup',
            ]
        ];

        foreach ($dummyData as $data) {
            try {
                Warga::create($data);
                \Log::info('Data dummy created: ' . $data['nama']);
            } catch (\Exception $e) {
                \Log::error('Gagal buat data dummy: ' . $e->getMessage());
                continue;
            }
        }
    }
}