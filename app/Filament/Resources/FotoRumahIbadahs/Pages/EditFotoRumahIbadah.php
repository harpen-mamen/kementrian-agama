<?php

namespace App\Filament\Resources\FotoRumahIbadahs\Pages;

use App\Filament\Resources\FotoRumahIbadahs\FotoRumahIbadahResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFotoRumahIbadah extends EditRecord
{
    protected static string $resource = FotoRumahIbadahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
