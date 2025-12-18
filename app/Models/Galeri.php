<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'galeri_id';
    
    protected $fillable = [
        'judul',
        'deskripsi',
        'foto'
    ];
}
