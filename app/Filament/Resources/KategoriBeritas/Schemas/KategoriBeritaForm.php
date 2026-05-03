<?php

namespace App\Filament\Resources\KategoriBeritas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KategoriBeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')->required()->maxLength(255),
                TextInput::make('slug')->required()->unique(ignoreRecord: true)->maxLength(255),
            ]);
    }
}
