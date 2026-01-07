<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;
use Faker\Factory as Faker;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $this->command->info('Membuat 100 data galeri dummy (Bahasa Indonesia)...');

        $judulList = [
            'Panen Raya Padi',
            'Gotong Royong Pembersihan Sungai',
            'Festival Budaya Desa',
            'Pembangunan Jembatan Dusun',
            'Pelatihan Kerajinan Ibu-Ibu PKK',
            'Posyandu Balita dan Lansia',
            'Pasar Tani Produk Lokal',
            'Penanaman Pohon Konservasi',
            'Upacara Bendera 17 Agustus',
            'Kelas Komputer untuk Remaja',
            'Renovasi Masjid Gotong Royong',
            'Lomba Masak Tradisional'
        ];

        for ($i = 0; $i < 100; $i++) {
            $judul = $faker->randomElement($judulList) . ' ' . ($i + 1);

            Galeri::create([
                'judul' => $judul,
                'deskripsi' => $faker->paragraphs(rand(1, 3), true),
                'foto' => 'https://picsum.photos/seed/galeri' . ($i + 1) . '/800/600',
            ]);
        }

        $this->command->info('Sukses membuat 100 data galeri dummy (Bahasa Indonesia)!');
    }
}