<?php

namespace App\Filament\Resources\FotoRumahIbadahs;

use App\Filament\Resources\FotoRumahIbadahs\Pages\CreateFotoRumahIbadah;
use App\Filament\Resources\FotoRumahIbadahs\Pages\EditFotoRumahIbadah;
use App\Filament\Resources\FotoRumahIbadahs\Pages\ListFotoRumahIbadahs;
use App\Filament\Resources\FotoRumahIbadahs\Schemas\FotoRumahIbadahForm;
use App\Filament\Resources\FotoRumahIbadahs\Tables\FotoRumahIbadahsTable;
use App\Models\FotoRumahIbadah;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FotoRumahIbadahResource extends Resource
{
    protected static ?string $model = FotoRumahIbadah::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'file_path';

    public static function form(Schema $schema): Schema
    {
        return FotoRumahIbadahForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FotoRumahIbadahsTable::configure($table);
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
            'index' => ListFotoRumahIbadahs::route('/'),
            'create' => CreateFotoRumahIbadah::route('/create'),
            'edit' => EditFotoRumahIbadah::route('/{record}/edit'),
        ];
    }
}
