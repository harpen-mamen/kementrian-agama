<?php

namespace App\Filament\Resources\LayananPengaduans\Pages;

use App\Filament\Resources\LayananPengaduans\LayananPengaduanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLayananPengaduan extends EditRecord
{
    protected static string $resource = LayananPengaduanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
