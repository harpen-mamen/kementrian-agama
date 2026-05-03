<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SekolahKeagamaan extends Model
{
    protected $table = 'sekolah_keagamaan';

    protected $fillable = [
        'nama', 'jenis', 'agama_id', 'alamat', 'kecamatan_id', 'desa_id', 'latitude', 'longitude',
        'jumlah_siswa', 'jumlah_guru', 'status_izin', 'akreditasi', 'kontak', 'status_data',
        'catatan_verifikasi', 'created_by', 'verified_by', 'published_at',
    ];

    protected function casts(): array
    {
        return [
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            'published_at' => 'datetime',
        ];
    }

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function desa(): BelongsTo
    {
        return $this->belongsTo(Desa::class);
    }

    public function agama(): BelongsTo
    {
        return $this->belongsTo(Agama::class);
    }
}
