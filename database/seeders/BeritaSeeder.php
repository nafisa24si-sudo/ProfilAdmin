<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua ID kategori yang ada agar relasinya valid
        // Jika tabel kategori kosong, kode akan error/stop.
        $kategoriIds = Kategori::pluck('id')->toArray();

        if (empty($kategoriIds)) {
            $this->command->info('Tabel kategori kosong. Jalankan KategoriSeeder terlebih dahulu!');
            return;
        }

        // Kita buat 25 berita dummy
        for ($i = 0; $i < 25; $i++) {
            
            // Membuat isi berita seolah-olah HTML (3 paragraf)
            $isiBerita = '';
            foreach ($faker->paragraphs(3) as $paragraf) {
                $isiBerita .= "<p>{$paragraf}</p>";
            }

            // Menggunakan Eloquent Create agar event 'booted' di Model jalan (untuk Slug otomatis)
            Berita::create([
                'kategori_id' => $faker->randomElement($kategoriIds), // Pilih kategori acak
                'judul'       => $this->generateJudul($faker), // Judul kustom gaya berita desa
                // 'slug'     => Tidak perlu diisi, otomatis dibuat oleh Model
                'isi_html'    => $isiBerita,
                'penulis'     => $faker->name, // Nama orang Indonesia
                'status'      => $faker->randomElement(['published', 'published', 'draft']), // Lebih banyak published
                'terbit_at'   => $faker->dateTimeBetween('-1 year', 'now'),
                'cover'       => null, // Kosongkan atau isi path gambar dummy
            ]);
        }
    }

    /**
     * Fungsi bantuan untuk membuat judul berita yang terdengar "Desa banget"
     */
    private function generateJudul($faker)
    {
        $prefix = [
            'Kegiatan', 'Pembangunan', 'Sosialisasi', 'Musyawarah', 'Perayaan', 
            'Kunjungan', 'Laporan', 'Warga', 'Prestasi'
        ];

        $topik = [
            'Gotong Royong Bersih Desa',
            'Penyaluran BLT Dana Desa',
            'Posyandu Balita dan Lansia',
            'Perbaikan Jalan Poros Desa',
            'Panen Raya Padi',
            'HUT Kemerdekaan RI ke-79',
            'Rapat Anggaran Desa',
            'Pelatihan UMKM Ibu-ibu PKK',
            'Vaksinasi Hewan Ternak',
            'Pentas Seni Pemuda'
        ];

        // 50% kemungkin pakai judul kustom, 50% pakai Faker kalimat biasa
        if (rand(0, 1)) {
            return $faker->randomElement($prefix) . ' ' . $faker->randomElement($topik);
        }

        return str_replace('.', '', $faker->sentence(6)); // Hapus titik di akhir judul
    }
}