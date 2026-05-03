<?php

namespace App\Filament\Resources\Agamas;

use App\Filament\Resources\Agamas\Pages\CreateAgama;
use App\Filament\Resources\Agamas\Pages\EditAgama;
use App\Filament\Resources\Agamas\Pages\ListAgamas;
use App\Filament\Resources\Agamas\Schemas\AgamaForm;
use App\Filament\Resources\Agamas\Tables\AgamasTable;
use App\Models\Agama;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AgamaResource extends Resource
{
    protected static ?string $model = Agama::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return AgamaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AgamasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAgamas::route('/'),
            'create' => CreateAgama::route('/create'),
            'edit' => EditAgama::route('/{record}/edit'),
        ];
    }
}
