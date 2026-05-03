<?php

namespace App\Filament\Resources\LayananPengaduans;

use App\Filament\Resources\LayananPengaduans\Pages\CreateLayananPengaduan;
use App\Filament\Resources\LayananPengaduans\Pages\EditLayananPengaduan;
use App\Filament\Resources\LayananPengaduans\Pages\ListLayananPengaduans;
use App\Filament\Resources\LayananPengaduans\Schemas\LayananPengaduanForm;
use App\Filament\Resources\LayananPengaduans\Tables\LayananPengaduansTable;
use App\Models\LayananPengaduan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LayananPengaduanResource extends Resource
{
    protected static ?string $model = LayananPengaduan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_pelapor';

    public static function form(Schema $schema): Schema
    {
        return LayananPengaduanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LayananPengaduansTable::configure($table);
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
            'index' => ListLayananPengaduans::route('/'),
            'create' => CreateLayananPengaduan::route('/create'),
            'edit' => EditLayananPengaduan::route('/{record}/edit'),
        ];
    }
}
