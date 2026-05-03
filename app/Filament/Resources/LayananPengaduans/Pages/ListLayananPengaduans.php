<?php

namespace App\Filament\Resources\LayananPengaduans\Pages;

use App\Filament\Resources\LayananPengaduans\LayananPengaduanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLayananPengaduans extends ListRecords
{
    protected static string $resource = LayananPengaduanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
