<?php

namespace App\Filament\Resources\DataUmats\Pages;

use App\Filament\Resources\DataUmats\DataUmatResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataUmats extends ListRecords
{
    protected static string $resource = DataUmatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
