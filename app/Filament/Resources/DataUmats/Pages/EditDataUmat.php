<?php

namespace App\Filament\Resources\DataUmats\Pages;

use App\Filament\Resources\DataUmats\DataUmatResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataUmat extends EditRecord
{
    protected static string $resource = DataUmatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
