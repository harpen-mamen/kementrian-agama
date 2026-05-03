<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananPengaduan extends Model
{
    protected $table = 'layanan_pengaduan';

    protected $fillable = [
        'nama_pelapor', 'kontak', 'kategori', 'isi_laporan', 'status', 'catatan_admin',
    ];
}
