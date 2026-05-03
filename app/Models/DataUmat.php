<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataUmat extends Model
{
    protected $table = 'data_umat';

    protected $fillable = [
        'tahun', 'kecamatan_id', 'desa_id', 'agama_id', 'jumlah', 'sumber_data',
        'status_data', 'catatan_verifikasi', 'created_by', 'verified_by',
    ];

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
