<?php

namespace App\Filament\Resources\PengajuanData\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PengajuanDataForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('jenis_data')->required()->maxLength(255),
                TextInput::make('data_id')->numeric()->required(),
                Select::make('submitted_by')->relationship('submitter', 'name')->required()->searchable()->preload(),
                Select::make('reviewed_by')->relationship('reviewer', 'name')->searchable()->preload(),
                Select::make('status')->options([
                    'draft' => 'Draft',
                    'diajukan' => 'Diajukan',
                    'perlu_revisi' => 'Perlu Revisi',
                    'ditolak' => 'Ditolak',
                    'disetujui' => 'Disetujui',
                    'dipublikasikan' => 'Dipublikasikan',
                    'diarsipkan' => 'Diarsipkan',
                ])->required(),
                Textarea::make('catatan')->columnSpanFull(),
                DateTimePicker::make('submitted_at'),
                DateTimePicker::make('reviewed_at'),
            ]);
    }
}
