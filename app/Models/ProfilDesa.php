<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfilDesa extends Model
{
    use HasFactory;

    // Gunakan nama tabel yang sudah ada di migration awal
    protected $table = 'profil_desa';

    protected $fillable = [
        'nama_desa',
        'telepon',
        'email',
        'alamat',
        'sejarah_singkat',
        'visi',
        'misi',
        'peta_embed_url',
    ];
}
