<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'beritas';

    // Kolom yang bisa diisi mass-assignment
    protected $fillable = [
        'kategori_id',
        'judul',
        'slug',
        'isi_html',
        'penulis',
        'status',
        'terbit_at',
        'cover',
    ];

    // Event otomatis ketika membuat berita
    protected static function booted()
    {
        static::creating(function ($berita) {
            // Buat slug unik berdasarkan judul
            $berita->slug = Str::slug($berita->judul) . '-' . time();
        });
    }

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
