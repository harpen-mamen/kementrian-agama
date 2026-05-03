<?php

namespace App\Filament\Resources\RumahIbadahs\Pages;

use App\Filament\Resources\RumahIbadahs\RumahIbadahResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRumahIbadah extends EditRecord
{
    protected static string $resource = RumahIbadahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
