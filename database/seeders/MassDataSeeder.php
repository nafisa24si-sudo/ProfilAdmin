<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agenda;
use App\Models\Galeri;

class MassDataSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama
        Agenda::truncate();
        Galeri::truncate();
        
        // Buat 120 data agenda
        Agenda::factory(120)->create();
        
        // Buat 120 data galeri
        Galeri::factory(120)->create();
    }
}