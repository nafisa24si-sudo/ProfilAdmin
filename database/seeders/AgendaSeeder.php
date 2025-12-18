<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agenda;

class AgendaSeeder extends Seeder
{
    public function run(): void
    {
        $agendas = [
            [
                'judul' => 'Rapat Koordinasi Pembangunan Jalan Desa',
                'lokasi' => 'Balai Desa Sukamaju',
                'tanggal_mulai' => now()->addDays(3)->setTime(9, 0),
                'tanggal_selesai' => now()->addDays(3)->setTime(12, 0),
                'penyelenggara' => 'Pemerintah Desa Sukamaju',
                'deskripsi' => 'Rapat koordinasi membahas rencana pembangunan jalan desa yang menghubungkan area pertanian dengan jalan utama. Akan dihadiri oleh kepala desa, BPD, dan perwakilan masyarakat.',
            ],
            [
                'judul' => 'Gotong Royong Pembersihan Lingkungan',
                'lokasi' => 'Seluruh Wilayah RT 01-05',
                'tanggal_mulai' => now()->addDays(7)->setTime(7, 0),
                'tanggal_selesai' => now()->addDays(7)->setTime(11, 0),
                'penyelenggara' => 'Karang Taruna Desa',
                'deskripsi' => 'Kegiatan gotong royong membersihkan lingkungan desa meliputi pembersihan selokan, pemangkasan pohon, dan pengecatan fasilitas umum. Diharapkan seluruh warga berpartisipasi aktif.',
            ],
            [
                'judul' => 'Pelatihan Budidaya Ikan Lele untuk Ibu-Ibu PKK',
                'lokasi' => 'Kolam Percontohan Desa',
                'tanggal_mulai' => now()->addDays(10)->setTime(13, 0),
                'tanggal_selesai' => now()->addDays(10)->setTime(16, 0),
                'penyelenggara' => 'Dinas Perikanan Kabupaten',
                'deskripsi' => 'Pelatihan praktis budidaya ikan lele untuk meningkatkan ekonomi keluarga. Materi meliputi persiapan kolam, pemilihan bibit, pemberian pakan, dan pemasaran hasil panen.',
            ],
            [
                'judul' => 'Festival Budaya Desa Nusantara',
                'lokasi' => 'Lapangan Desa Sukamaju',
                'tanggal_mulai' => now()->addDays(14)->setTime(16, 0),
                'tanggal_selesai' => now()->addDays(14)->setTime(21, 0),
                'penyelenggara' => 'Komunitas Seni Budaya Desa',
                'deskripsi' => 'Festival budaya menampilkan tarian tradisional, musik daerah, pameran kerajinan tangan, dan kuliner khas desa. Acara terbuka untuk umum dan gratis.',
            ],
            [
                'judul' => 'Sosialisasi Program Bantuan Sosial Pemerintah',
                'lokasi' => 'Aula Kantor Desa',
                'tanggal_mulai' => now()->addDays(21)->setTime(10, 0),
                'tanggal_selesai' => now()->addDays(21)->setTime(14, 0),
                'penyelenggara' => 'Dinas Sosial Kabupaten',
                'deskripsi' => 'Sosialisasi berbagai program bantuan sosial pemerintah seperti PKH, BPNT, dan bantuan pendidikan. Peserta adalah kepala keluarga penerima manfaat dan calon penerima.',
            ],
            [
                'judul' => 'Pemilihan Ketua RT/RW Periode 2024-2029',
                'lokasi' => 'Balai Pertemuan Desa',
                'tanggal_mulai' => now()->addDays(28)->setTime(8, 0),
                'tanggal_selesai' => now()->addDays(28)->setTime(17, 0),
                'penyelenggara' => 'Panitia Pemilihan Desa',
                'deskripsi' => 'Pelaksanaan pemilihan ketua RT dan RW untuk periode 2024-2029. Pemilihan dilakukan secara demokratis dengan sistem pemungutan suara langsung oleh warga.',
            ],
            [
                'judul' => 'Penyuluhan Kesehatan Ibu dan Anak',
                'lokasi' => 'Posyandu Melati',
                'tanggal_mulai' => now()->addDays(35)->setTime(9, 0),
                'tanggal_selesai' => now()->addDays(35)->setTime(12, 0),
                'penyelenggara' => 'Puskesmas Kecamatan',
                'deskripsi' => 'Penyuluhan kesehatan tentang gizi ibu hamil, imunisasi anak, dan pencegahan stunting. Akan ada pemeriksaan kesehatan gratis dan pembagian vitamin.',
            ],
            [
                'judul' => 'Workshop Pengolahan Sampah Organik Menjadi Kompos',
                'lokasi' => 'Bank Sampah Desa',
                'tanggal_mulai' => now()->addDays(42)->setTime(14, 0),
                'tanggal_selesai' => now()->addDays(42)->setTime(17, 0),
                'penyelenggara' => 'Kelompok Peduli Lingkungan',
                'deskripsi' => 'Workshop praktis mengolah sampah organik menjadi kompos berkualitas. Peserta akan belajar teknik composting dan mendapat starter kit untuk praktik di rumah.',
            ],
        ];

        foreach ($agendas as $agenda) {
            Agenda::create($agenda);
        }
    }
}