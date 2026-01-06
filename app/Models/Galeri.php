<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    
    protected $table = 'galeri';
    protected $primaryKey = 'galeri_id';
    
    protected $fillable = [
        'judul',
        'deskripsi',
        'foto'
    ];
    
    public function getRouteKeyName()
    {
        return 'galeri_id';
    }
}
