<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // 🔥 PENTING: nama tabel sesuai migration
    protected $table = 'kategori_berita';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
    ];
}
