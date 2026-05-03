<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agama extends Model
{
    public $timestamps = false;

    protected $fillable = ['nama'];

    public function rumahIbadah(): HasMany
    {
        return $this->hasMany(RumahIbadah::class);
    }

    public function sekolahKeagamaan(): HasMany
    {
        return $this->hasMany(SekolahKeagamaan::class);
    }

    public function dataUmat(): HasMany
    {
        return $this->hasMany(DataUmat::class);
    }
}
