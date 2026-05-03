<?php

namespace App\Filament\Resources\SekolahKeagamaans\Pages;

use App\Filament\Resources\SekolahKeagamaans\SekolahKeagamaanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSekolahKeagamaans extends ListRecords
{
    protected static string $resource = SekolahKeagamaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
