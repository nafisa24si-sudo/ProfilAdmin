<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AgendaFactory extends Factory
{
    public function definition(): array
    {
        $judulAgenda = [
            'Rapat Koordinasi Pembangunan', 'Gotong Royong Pembersihan', 'Pelatihan Budidaya', 'Festival Budaya',
            'Sosialisasi Program Bantuan', 'Pemilihan Ketua RT/RW', 'Penyuluhan Kesehatan', 'Workshop Pengolahan Sampah',
            'Musyawarah Desa', 'Kerja Bakti Lingkungan', 'Pelatihan Keterampilan', 'Lomba Desa',
            'Rapat Evaluasi Program', 'Kegiatan Posyandu', 'Pelatihan Komputer', 'Bakti Sosial',
            'Pameran Produk Desa', 'Senam Sehat Bersama', 'Penanaman Pohon', 'Pembagian Bantuan',
        ];

        $lokasi = [
            'Balai Desa', 'Lapangan Desa', 'Aula Kantor Desa', 'Posyandu', 'Masjid Desa',
            'Sekolah Dasar', 'Puskesmas', 'Bank Sampah', 'Kolam Percontohan', 'Sawah Desa',
            'RT 01', 'RT 02', 'RT 03', 'RW 01', 'RW 02', 'Balai Pertemuan',
        ];

        $penyelenggara = [
            'Pemerintah Desa', 'Karang Taruna', 'PKK Desa', 'BPD', 'Kelompok Tani',
            'Dinas Kesehatan', 'Dinas Sosial', 'Puskesmas', 'Komunitas Peduli Lingkungan',
            'RT/RW', 'Panitia Desa', 'Kelompok Pemuda', 'Organisasi Masyarakat',
        ];

        $tanggalMulai = $this->faker->dateTimeBetween('now', '+6 months');
        $tanggalSelesai = (clone $tanggalMulai)->modify('+' . rand(1, 8) . ' hours');

        return [
            'judul' => $this->faker->randomElement($judulAgenda) . ' ' . $this->faker->words(2, true),
            'lokasi' => $this->faker->randomElement($lokasi),
            'tanggal_mulai' => $tanggalMulai,
            'tanggal_selesai' => $tanggalSelesai,
            'penyelenggara' => $this->faker->randomElement($penyelenggara),
            'deskripsi' => $this->faker->paragraph(3),
        ];
    }
}