<?php

namespace App\Filament\Resources\RumahIbadahs\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RumahIbadahForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')->required()->maxLength(255),
                TextInput::make('jenis')->required()->maxLength(255),
                Select::make('agama_id')->relationship('agama', 'nama')->required()->searchable()->preload(),
                TextInput::make('denominasi')->maxLength(255),
                Textarea::make('alamat')->required()->columnSpanFull(),
                Select::make('kecamatan_id')->relationship('kecamatan', 'nama')->required()->searchable()->preload(),
                Select::make('desa_id')->relationship('desa', 'nama')->searchable()->preload(),
                TextInput::make('latitude')->numeric(),
                TextInput::make('longitude')->numeric(),
                TextInput::make('jumlah_jemaat')->numeric(),
                TextInput::make('jumlah_kk')->numeric(),
                TextInput::make('kapasitas')->numeric(),
                TextInput::make('tahun_berdiri')->numeric()->minValue(1800)->maxValue(now()->year),
                Textarea::make('jadwal_ibadah')->columnSpanFull(),
                TextInput::make('nama_pengurus')->maxLength(255),
                TextInput::make('kontak_resmi')->maxLength(255),
                Select::make('status_data')->options([
                    'draft' => 'Draft',
                    'diajukan' => 'Diajukan',
                    'perlu_revisi' => 'Perlu Revisi',
                    'ditolak' => 'Ditolak',
                    'disetujui' => 'Disetujui',
                    'dipublikasikan' => 'Dipublikasikan',
                    'diarsipkan' => 'Diarsipkan',
                ])->default('draft')->required(),
                Textarea::make('catatan_verifikasi')->columnSpanFull(),
                DateTimePicker::make('published_at'),
            ]);
    }
}
