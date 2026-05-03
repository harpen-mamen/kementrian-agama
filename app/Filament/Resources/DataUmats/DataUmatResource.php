<?php

namespace App\Filament\Resources\DataUmats;

use App\Filament\Resources\DataUmats\Pages\CreateDataUmat;
use App\Filament\Resources\DataUmats\Pages\EditDataUmat;
use App\Filament\Resources\DataUmats\Pages\ListDataUmats;
use App\Filament\Resources\DataUmats\Schemas\DataUmatForm;
use App\Filament\Resources\DataUmats\Tables\DataUmatsTable;
use App\Models\DataUmat;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DataUmatResource extends Resource
{
    protected static ?string $model = DataUmat::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'tahun';

    public static function form(Schema $schema): Schema
    {
        return DataUmatForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataUmatsTable::configure($table);
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
            'index' => ListDataUmats::route('/'),
            'create' => CreateDataUmat::route('/create'),
            'edit' => EditDataUmat::route('/{record}/edit'),
        ];
    }
}
