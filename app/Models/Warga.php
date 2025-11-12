<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_warga';
    protected $table = 'wargas';

    // PASTIKAN fillable ADA dan BENAR
    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'alamat',
        'rt',
        'rw',
        'status_warga',
        'status_hidup'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date'
    ];
}