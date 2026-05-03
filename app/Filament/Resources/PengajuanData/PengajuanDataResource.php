<?php

namespace App\Filament\Resources\PengajuanData;

use App\Filament\Resources\PengajuanData\Pages\CreatePengajuanData;
use App\Filament\Resources\PengajuanData\Pages\EditPengajuanData;
use App\Filament\Resources\PengajuanData\Pages\ListPengajuanData;
use App\Filament\Resources\PengajuanData\Schemas\PengajuanDataForm;
use App\Filament\Resources\PengajuanData\Tables\PengajuanDataTable;
use App\Models\PengajuanData;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PengajuanDataResource extends Resource
{
    protected static ?string $model = PengajuanData::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'jenis_data';

    public static function form(Schema $schema): Schema
    {
        return PengajuanDataForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PengajuanDataTable::configure($table);
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
            'index' => ListPengajuanData::route('/'),
            'create' => CreatePengajuanData::route('/create'),
            'edit' => EditPengajuanData::route('/{record}/edit'),
        ];
    }
}
