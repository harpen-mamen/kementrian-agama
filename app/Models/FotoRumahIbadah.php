<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FotoRumahIbadah extends Model
{
    protected $table = 'foto_rumah_ibadah';

    protected $fillable = ['rumah_ibadah_id', 'file_path', 'keterangan', 'is_utama'];

    protected function casts(): array
    {
        return ['is_utama' => 'boolean'];
    }

    public function rumahIbadah(): BelongsTo
    {
        return $this->belongsTo(RumahIbadah::class);
    }
}
