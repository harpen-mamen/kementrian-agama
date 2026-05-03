<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    public function run(): void
    {
        // TODO: Verifikasi kembali ejaan resmi kecamatan sesuai dokumen Kemenag/BPS terbaru.
        $kecamatans = [
            'Tahuna',
            'Tahuna Barat',
            'Tahuna Timur',
            'Manganitu',
            'Manganitu Selatan',
            'Tamako',
            'Tabukan Utara',
            'Tabukan Tengah',
            'Tabukan Selatan',
            'Tabukan Selatan Tengah',
            'Tabukan Selatan Tenggara',
            'Kendahe',
            'Marore',
            'Nusa Tabukan',
            'Tatoareng',
        ];

        foreach ($kecamatans as $nama) {
            Kecamatan::updateOrCreate(['nama' => $nama]);
        }
    }
}
