<?php

namespace App\Filament\Resources\PengajuanData\Pages;

use App\Filament\Resources\PengajuanData\PengajuanDataResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPengajuanData extends ListRecords
{
    protected static string $resource = PengajuanDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
