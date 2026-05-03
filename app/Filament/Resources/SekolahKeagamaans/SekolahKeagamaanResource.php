<?php

namespace App\Filament\Resources\SekolahKeagamaans;

use App\Filament\Resources\SekolahKeagamaans\Pages\CreateSekolahKeagamaan;
use App\Filament\Resources\SekolahKeagamaans\Pages\EditSekolahKeagamaan;
use App\Filament\Resources\SekolahKeagamaans\Pages\ListSekolahKeagamaans;
use App\Filament\Resources\SekolahKeagamaans\Schemas\SekolahKeagamaanForm;
use App\Filament\Resources\SekolahKeagamaans\Tables\SekolahKeagamaansTable;
use App\Models\SekolahKeagamaan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SekolahKeagamaanResource extends Resource
{
    protected static ?string $model = SekolahKeagamaan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return SekolahKeagamaanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SekolahKeagamaansTable::configure($table);
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
            'index' => ListSekolahKeagamaans::route('/'),
            'create' => CreateSekolahKeagamaan::route('/create'),
            'edit' => EditSekolahKeagamaan::route('/{record}/edit'),
        ];
    }
}
