<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'kategori_id',
        'isi_html',
        'penulis',
        'status',
        'terbit_at',
        'cover',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function mediaFiles()
    {
        return $this->hasMany(Media::class, 'ref_id')
            ->where('ref_table', 'berita')
            ->orderBy('sort_order');
    }

    /**
     * Scope search (yang kamu pakai di index)
     */
    public function scopeSearch($query, $request, array $columns)
    {
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'like', '%' . $request->search . '%');
                }
            });
        }

        return $query;
    }
}
