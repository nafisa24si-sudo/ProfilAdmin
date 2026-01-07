<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Daftar kategori spesifik untuk Website Desa / Berita
        $daftarKategori = [
            'Berita Desa',
            'Pengumuman',
            'Pemerintahan',
            'Layanan Masyarakat',
            'Pembangunan Desa',
            'Potensi Desa',
            'Produk Hukum',
            'Agenda Kegiatan',
            'Transparansi Anggaran',
            'Ekonomi & UMKM',
            'Kesehatan',
            'Pendidikan',
            'Pemuda & Olahraga',
            'Sosial Budaya',
            'Galeri Foto'
        ];

        // Kita loop array di atas agar datanya pasti sesuai keinginan
        foreach ($daftarKategori as $nama) {
            DB::table('kategori_berita')->insert([
                'nama'      => $nama,
                'slug'      => Str::slug($nama), // Contoh: 'layanan-masyarakat'
                // Membuat deskripsi random bahasa Indonesia yang relevan
                'deskripsi' => 'Kumpulan informasi terkini mengenai ' . $nama . ' di lingkungan desa kami.', 
                'created_at'=> now(),
                'updated_at'=> now(),
            ]);
        }
    }
}