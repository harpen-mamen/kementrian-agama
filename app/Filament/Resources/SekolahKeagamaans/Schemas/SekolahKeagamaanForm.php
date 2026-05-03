<?php

namespace App\Filament\Resources\SekolahKeagamaans\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SekolahKeagamaanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')->required()->maxLength(255),
                TextInput::make('jenis')->required()->maxLength(255),
                Select::make('agama_id')->relationship('agama', 'nama')->required()->searchable()->preload(),
                Textarea::make('alamat')->required()->columnSpanFull(),
                Select::make('kecamatan_id')->relationship('kecamatan', 'nama')->required()->searchable()->preload(),
                Select::make('desa_id')->relationship('desa', 'nama')->searchable()->preload(),
                TextInput::make('latitude')->numeric(),
                TextInput::make('longitude')->numeric(),
                TextInput::make('jumlah_siswa')->numeric(),
                TextInput::make('jumlah_guru')->numeric(),
                TextInput::make('status_izin')->maxLength(255),
                TextInput::make('akreditasi')->maxLength(255),
                TextInput::make('kontak')->maxLength(255),
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
