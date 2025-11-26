<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'kategori_id',
        'isi_html',
        'penulis',
        'status',
        'terbit_at',
        'cover'
    ];

    protected $casts = [
        'terbit_at' => 'datetime'
    ];

    // Relationship dengan kategori
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    // Scope untuk filter
    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }

    /**
     * Scope untuk search pada beberapa kolom.
     * Pemanggilan: ->search($request, ['judul','isi_html','penulis'])
     */
    public function scopeSearch(Builder $query, $request, array $columns): Builder
    {
        if (!$request->filled('search')) {
            return $query;
        }

        $term = $request->input('search');

        return $query->where(function (Builder $q) use ($columns, $term) {
            foreach ($columns as $col) {
                $q->orWhere($col, 'like', '%' . $term . '%');
            }
        });
    }
}