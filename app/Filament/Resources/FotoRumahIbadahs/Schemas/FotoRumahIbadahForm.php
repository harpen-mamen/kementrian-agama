<?php

namespace App\Filament\Resources\FotoRumahIbadahs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FotoRumahIbadahForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('rumah_ibadah_id')->relationship('rumahIbadah', 'nama')->required()->searchable()->preload(),
                FileUpload::make('file_path')->label('Foto')->image()->directory('rumah-ibadah')->required(),
                TextInput::make('keterangan')->maxLength(255),
                Toggle::make('is_utama')->label('Foto Utama'),
            ]);
    }
}
