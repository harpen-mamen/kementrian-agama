<?php

namespace App\Filament\Resources\RumahIbadahs;

use App\Filament\Resources\RumahIbadahs\Pages\CreateRumahIbadah;
use App\Filament\Resources\RumahIbadahs\Pages\EditRumahIbadah;
use App\Filament\Resources\RumahIbadahs\Pages\ListRumahIbadahs;
use App\Filament\Resources\RumahIbadahs\Schemas\RumahIbadahForm;
use App\Filament\Resources\RumahIbadahs\Tables\RumahIbadahsTable;
use App\Models\RumahIbadah;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RumahIbadahResource extends Resource
{
    protected static ?string $model = RumahIbadah::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return RumahIbadahForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RumahIbadahsTable::configure($table);
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
            'index' => ListRumahIbadahs::route('/'),
            'create' => CreateRumahIbadah::route('/create'),
            'edit' => EditRumahIbadah::route('/{record}/edit'),
        ];
    }
}
