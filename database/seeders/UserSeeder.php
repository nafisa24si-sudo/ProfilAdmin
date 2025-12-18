<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin default
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@sidesa.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // User test
        User::create([
            'name' => 'User Test',
            'email' => 'user@sidesa.com', 
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}