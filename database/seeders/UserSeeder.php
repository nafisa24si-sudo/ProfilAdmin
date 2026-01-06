<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Super Admin
        User::updateOrCreate(
            ['email' => 'superadmin@sidesa.com'],
            [
                'name' => 'Super Administrator',
                'password' => Hash::make('password'),
                'role' => 'super_admin',
            ]
        );

        // Admin
        User::updateOrCreate(
            ['email' => 'admin@sidesa.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // Petugas
        User::updateOrCreate(
            ['email' => 'petugas@sidesa.com'],
            [
                'name' => 'Petugas Desa',
                'password' => Hash::make('password'),
                'role' => 'petugas',
            ]
        );

        // Generate additional users only if total < 200
        $currentCount = User::count();
        $needed = 200 - $currentCount;
        
        if ($needed > 0) {
            $faker = Faker::create('id_ID');
            $this->command->info("Membuat {$needed} user tambahan...");

            for ($i = 0; $i < $needed; $i++) {
                User::create([
                    'name' => $faker->name,
                    'email' => $faker->unique()->email,
                    'password' => Hash::make('password'),
                    'role' => $faker->randomElement(['admin', 'petugas']),
                ]);

                if (($i + 1) % 50 === 0) {
                    $this->command->info("Created " . ($currentCount + $i + 1) . " users...");
                }
            }
        }

        $this->command->info('Total users: ' . User::count());
    }
}