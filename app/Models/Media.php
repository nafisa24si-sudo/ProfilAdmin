<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';
    protected $primaryKey = 'media_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'ref_table',
        'ref_id',
        'file_name',
        'caption',
        'mime_type',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope untuk mencari media berdasarkan tabel referensi dan ID
     */
    public function scopeForRef($query, $refTable, $refId)
    {
        return $query->where('ref_table', $refTable)
                     ->where('ref_id', $refId)
                     ->orderBy('sort_order', 'asc');
    }

    /**
     * Dapatkan URL lengkap file media
     */
    public function getFileUrl()
    {
        return asset('storage/media/' . $this->file_name);
    }

    /**
     * Cek apakah file adalah gambar
     */
    public function isImage()
    {
        return strpos($this->mime_type, 'image/') === 0;
    }

    /**
     * Cek apakah file adalah PDF
     */
    public function isPdf()
    {
        return $this->mime_type === 'application/pdf';
    }
}
