<?php

namespace Database\Seeders;

use App\Models\Warga;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        $this->command->info('Membuat 200 data warga Indonesia...');

        for ($i = 0; $i < 200; $i++) {
            Warga::create([
                'nama' => $faker->name,
                'nik' => $faker->unique()->numerify('################'),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date('Y-m-d', '2005-01-01'),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'alamat' => $faker->address,
                'rt' => $faker->numberBetween(1, 15),
                'rw' => $faker->numberBetween(1, 8),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'status_perkawinan' => $faker->randomElement(['Belum Kawin', 'Kawin', 'Cerai']),
                'pekerjaan' => $faker->randomElement([
                    'Petani', 'Buruh Tani', 'Pedagang', 'Wiraswasta', 'PNS', 
                    'TNI/Polri', 'Guru', 'Dokter', 'Bidan', 'Perawat',
                    'Sopir', 'Tukang', 'Nelayan', 'Peternak', 'Ibu Rumah Tangga'
                ]),
                'status_warga' => $faker->randomElement(['Tetap', 'Kontrak/Kos', 'Pendatang']),
                'status_hidup' => 'Hidup',
            ]);

            if (($i + 1) % 50 === 0) {
                $this->command->info("Created " . ($i + 1) . " warga...");
            }
        }

        $this->command->info('Sukses membuat 200 data warga Indonesia!');
    }
}