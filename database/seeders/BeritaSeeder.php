<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $kategoriIds = Kategori::pluck('id')->toArray();

        if (empty($kategoriIds)) {
            $this->command->info('Tabel kategori kosong. Membuat kategori default...');

            $defaultKategori = [
                ['nama' => 'Pengumuman', 'deskripsi' => 'Informasi penting untuk warga'],
                ['nama' => 'Kegiatan', 'deskripsi' => 'Berita tentang kegiatan desa'],
                ['nama' => 'Pembangunan', 'deskripsi' => 'Proyek dan pembangunan desa'],
                ['nama' => 'Sosial', 'deskripsi' => 'Berita sosial dan bantuan'],
                ['nama' => 'Pendidikan', 'deskripsi' => 'Kegiatan pendidikan dan posyandu'],
            ];

            foreach ($defaultKategori as $k) {
                $k['slug'] = Str::slug($k['nama']);
                try {
                    Kategori::create($k);
                } catch (\Exception $e) {
                    Log::error('Gagal membuat kategori default: ' . $e->getMessage());
                }
            }

            $kategoriIds = Kategori::pluck('id')->toArray();
            $this->command->info('Kategori default berhasil dibuat.');
        }

    $this->command->info('Membuat 100 data berita dummy...');

    for ($i = 0; $i < 100; $i++) {

            $isiBerita = '';
            foreach ($faker->paragraphs(rand(3, 4)) as $paragraf) {
                $isiBerita .= "<p>{$paragraf}</p>";
            }

          
            $covers = [
                'https://picsum.photos/seed/' . ($i + 1) . '/1200/800',
                'https://picsum.photos/seed/berita' . ($i + 1) . '/1200/800',
                null // beberapa entri tanpa cover
            ];

            $judul = $this->generateJudulIndonesia($faker);
         
            $baseSlug = Str::slug($judul);
            $slug = $baseSlug;
            $suffix = 1;
            while (Berita::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $suffix++;
            }

            try {
                Berita::create([
                    'kategori_id' => $faker->randomElement($kategoriIds),
                    'judul'       => $judul,
                    'isi_html'    => $isiBerita,
                    'penulis'     => $faker->name,
                    'status'      => $faker->randomElement(['published', 'published', 'draft']),
                    'terbit_at'   => $faker->dateTimeBetween('-6 months', 'now'),
                    'cover'       => $faker->randomElement($covers),
                    'slug'        => $slug,
                ]);
            } catch (\Exception $e) {
                // jika ada error unik lainnya, log dan lanjutkan
                $this->command->error("Gagal membuat berita ke-" . ($i + 1) . ": " . $e->getMessage());
                continue;
            }

            // Progress indicator
            if (($i + 1) % 50 === 0) {
                $this->command->info("Created {$i} berita...");
            }
        }

        $this->command->info('Sukses membuat 100 data berita dummy!');
    }

    /**
     * Membuat judul berita yang khas Indonesia (desa/kelurahan)
     */
    private function generateJudulIndonesia($faker)
    {
        $template1 = [
            'Kegiatan %s Digelar di Balai Desa',
            'Warga %s Antusias Mengikuti Program Desa',
            'Pemdes Adakan %s untuk Masyarakat',
            'Sosialisasi %s Resmi Dimulai',
            'Pemuda Desa Sukses Gelar %s Tahunan',
            'Acara %s Berjalan dengan Sukses',
            'Program %s Dapat Apresiasi dari Warga',
            'Pelaksanaan %s di Desa Kita',
            'Rangkaian %s Menarik Minat Masyarakat',
            'Inisiatif %s Dukung Kemajuan Desa'
        ];

        $template2 = [
            'Pembangunan %s Mulai Dikerjakan',
            'Perbaikan %s Akhirnya Rampung',
            'Program %s Mendapat Dukungan Warga',
            '%s Jadi Fokus Pembangunan Tahun Ini',
            'Proyek %s Tuntas sesuai Jadwal',
            'Renovasi %s Tinggal Selangkah Lagi',
            'Inovasi %s Tingkatkan Kesejahteraan',
            'Pengembangan %s Capai Target',
            'Rehabilitasi %s Berjalan Lancar',
            'Modernisasi %s Sukses Dilaksanakan'
        ];

        $topik = [
            'Gotong Royong',
            'Posyandu Balita',
            'Pelatihan UMKM',
            'Festival Budaya',
            'Pengajian Akbar',
            'Pembangunan Jalan Utama',
            'Penyaluran Bantuan Sosial',
            'Bersih-Bersih Lingkungan',
            'Vaksinasi Ternak',
            'Perayaan HUT Kemerdekaan',
            'Lomba Olahraga Desa',
            'Pasar Murah',
            'Koperasi Simpan Pinjam',
            'Taman Baca Masyarakat',
            'Bank Sampah',
            'Wisata Desa',
            'Pertanian Organik',
            'Peternakan Modern',
            'Perikanan Budidaya',
            'Kerajinan Tangan'
        ];

        // 50% pakai template1, 50% pakai template2
        if (rand(0, 1)) {
            $judul = sprintf(
                $faker->randomElement($template1),
                $faker->randomElement($topik)
            );
        } else {
            $judul = sprintf(
                $faker->randomElement($template2),
                $faker->randomElement($topik)
            );
        }

        return $judul;
    }
}