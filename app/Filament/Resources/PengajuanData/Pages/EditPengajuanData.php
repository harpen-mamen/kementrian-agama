<?php

namespace App\Filament\Resources\PengajuanData\Pages;

use App\Filament\Resources\PengajuanData\PengajuanDataResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPengajuanData extends EditRecord
{
    protected static string $resource = PengajuanDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
