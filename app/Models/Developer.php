<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $fillable = [
        'nama',
        'posisi', 
        'deskripsi',
        'foto',
        'email',
        'github',
        'linkedin'
    ];
}
