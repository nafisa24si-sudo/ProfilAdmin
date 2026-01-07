<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agenda;
use Faker\Factory as Faker;

class AgendaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $this->command->info('Membuat 100 data agenda dummy (Bahasa Indonesia)...');

        $judulTemplates = [
            'Rapat Koordinasi %s',
            'Gotong Royong %s',
            'Pelatihan %s untuk Warga',
            'Sosialisasi %s',
            'Festival %s Desa',
            'Penyuluhan %s',
            'Pelayanan %s Gratis',
            'Pertemuan Rutin %s',
            'Seminar %s',
            'Pengajian Akbar %s'
        ];

        $lokasiList = ['Balai Desa Sukamaju', 'Lapangan Desa', 'Aula Kantor Desa', 'Posyandu Melati', 'Kolam Percontohan', 'Balai Pertemuan', 'Gedung Serba Guna', 'Kantor Desa'];
        $penyelenggaraList = ['Pemerintah Desa', 'Karang Taruna', 'Kelompok Tani', 'PKK Desa', 'Dinas Kesehatan Kecamatan', 'Dinas Pertanian', 'Panitia Lokal', 'Komunitas Seni Budaya'];
        $topik = ['Pembangunan Jalan', 'Kebersihan Lingkungan', 'Budidaya Ikan', 'Posyandu Balita', 'Pelatihan UMKM', 'Pengelolaan Sampah', 'Pertanian Organik', 'Festival Budaya', 'Lomba Olahraga', 'Koperasi Desa'];

        for ($i = 0; $i < 100; $i++) {
            $start = $faker->dateTimeBetween('now', '+120 days');
            $end = (clone $start)->modify('+' . rand(1, 8) . ' hours');

            $judul = sprintf($faker->randomElement($judulTemplates), $faker->randomElement($topik));

            Agenda::create([
                'judul' => $judul,
                'lokasi' => $faker->randomElement($lokasiList),
                'tanggal_mulai' => $start,
                'tanggal_selesai' => $end,
                'penyelenggara' => $faker->randomElement($penyelenggaraList),
                'deskripsi' => $faker->paragraphs(rand(2, 4), true),
            ]);
        }

        $this->command->info('Sukses membuat 100 data agenda dummy (Bahasa Indonesia)!');
    }
}