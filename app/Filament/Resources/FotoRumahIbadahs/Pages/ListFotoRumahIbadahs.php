<?php

namespace App\Filament\Resources\FotoRumahIbadahs\Pages;

use App\Filament\Resources\FotoRumahIbadahs\FotoRumahIbadahResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFotoRumahIbadahs extends ListRecords
{
    protected static string $resource = FotoRumahIbadahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
