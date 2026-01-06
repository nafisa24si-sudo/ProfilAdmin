<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori_berita';

    protected $fillable = ['nama', 'slug', 'deskripsi'];

    // Otomatis buat slug dari nama
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kategori) {
            $kategori->slug = Str::slug($kategori->nama);
        });

        static::updating(function ($kategori) {
            $kategori->slug = Str::slug($kategori->nama);
        });
    }
}
