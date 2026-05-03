<?php

namespace App\Filament\Resources\LayananPengaduans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LayananPengaduanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_pelapor')->required()->maxLength(255),
                TextInput::make('kontak')->required()->maxLength(255),
                TextInput::make('kategori')->required()->maxLength(255),
                Textarea::make('isi_laporan')->required()->columnSpanFull(),
                Select::make('status')->options([
                    'diterima' => 'Diterima',
                    'diproses' => 'Diproses',
                    'selesai' => 'Selesai',
                ])->default('diterima')->required(),
                Textarea::make('catatan_admin')->columnSpanFull(),
            ]);
    }
}
