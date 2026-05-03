<?php

namespace App\Filament\Resources\Agamas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AgamaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')->required()->maxLength(255),
            ]);
    }
}
