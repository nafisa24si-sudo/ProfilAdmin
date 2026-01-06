<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    
    protected $table = 'agenda';
    protected $primaryKey = 'agenda_id';
    
    protected $fillable = [
        'judul',
        'lokasi',
        'tanggal_mulai',
        'tanggal_selesai',
        'penyelenggara',
        'deskripsi',
        'poster'
    ];
    
    protected $casts = [
        'tanggal_mulai' => 'datetime',
        'tanggal_selesai' => 'datetime'
    ];
}
