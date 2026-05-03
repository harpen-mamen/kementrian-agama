<?php

namespace App\Filament\Resources\Desas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DesaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kecamatan_id')->relationship('kecamatan', 'nama')->required()->searchable()->preload(),
                TextInput::make('nama')->required()->maxLength(255),
            ]);
    }
}
