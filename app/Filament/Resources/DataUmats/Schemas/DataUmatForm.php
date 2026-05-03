<?php

namespace App\Filament\Resources\DataUmats\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DataUmatForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tahun')->numeric()->required()->minValue(2000)->maxValue(now()->year),
                Select::make('kecamatan_id')->relationship('kecamatan', 'nama')->required()->searchable()->preload(),
                Select::make('desa_id')->relationship('desa', 'nama')->searchable()->preload(),
                Select::make('agama_id')->relationship('agama', 'nama')->required()->searchable()->preload(),
                TextInput::make('jumlah')->numeric()->required(),
                TextInput::make('sumber_data')->maxLength(255),
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
            ]);
    }
}
