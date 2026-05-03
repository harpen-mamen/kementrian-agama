<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RumahIbadah extends Model
{
    protected $table = 'rumah_ibadah';

    protected $fillable = [
        'nama', 'jenis', 'agama_id', 'denominasi', 'alamat', 'kecamatan_id', 'desa_id',
        'latitude', 'longitude', 'jumlah_jemaat', 'jumlah_kk', 'kapasitas', 'tahun_berdiri',
        'jadwal_ibadah', 'nama_pengurus', 'kontak_resmi', 'status_data', 'catatan_verifikasi',
        'created_by', 'verified_by', 'published_at',
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

    public function fotoRumahIbadah(): HasMany
    {
        return $this->hasMany(FotoRumahIbadah::class);
    }
}
