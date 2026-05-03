<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [
        'kategori_berita_id', 'judul', 'slug', 'ringkasan', 'isi', 'gambar',
        'status', 'published_at', 'created_by',
    ];

    protected function casts(): array
    {
        return ['published_at' => 'datetime'];
    }

    public function kategoriBerita(): BelongsTo
    {
        return $this->belongsTo(KategoriBerita::class);
    }
}
