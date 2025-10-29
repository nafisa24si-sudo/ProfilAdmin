<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Kolom yang boleh diisi secara mass-assignment.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Kolom yang disembunyikan saat serialisasi (misal ke JSON).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting kolom ke tipe data tertentu.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Set password agar otomatis di-hash setiap kali diset.
     */
    public function setPasswordAttribute($value)
    {
        // Jika password belum di-hash, hash otomatis
        if (!empty($value) && substr($value, 0, 7) !== '$2y$') {
            $this->attributes['password'] = bcrypt($value);
        } else {
            $this->attributes['password'] = $value;
        }
    }
}
