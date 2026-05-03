<?php

namespace App\Filament\Resources\RumahIbadahs\Pages;

use App\Filament\Resources\RumahIbadahs\RumahIbadahResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRumahIbadahs extends ListRecords
{
    protected static string $resource = RumahIbadahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
