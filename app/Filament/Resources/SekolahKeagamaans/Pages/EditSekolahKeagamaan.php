<?php

namespace App\Filament\Resources\SekolahKeagamaans\Pages;

use App\Filament\Resources\SekolahKeagamaans\SekolahKeagamaanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSekolahKeagamaan extends EditRecord
{
    protected static string $resource = SekolahKeagamaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
