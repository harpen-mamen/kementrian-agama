<?php

namespace App\Filament\Resources\SekolahKeagamaans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class SekolahKeagamaansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('jenis')->searchable(),
                TextColumn::make('agama.nama')->label('Agama')->sortable(),
                TextColumn::make('kecamatan.nama')->label('Kecamatan')->sortable(),
                TextColumn::make('jumlah_siswa')->numeric()->sortable(),
                TextColumn::make('status_data')->badge()->sortable(),
            ])
            ->filters([
                SelectFilter::make('kecamatan_id')->relationship('kecamatan', 'nama')->label('Kecamatan'),
                SelectFilter::make('status_data')->options([
                    'draft' => 'Draft',
                    'diajukan' => 'Diajukan',
                    'perlu_revisi' => 'Perlu Revisi',
                    'ditolak' => 'Ditolak',
                    'disetujui' => 'Disetujui',
                    'dipublikasikan' => 'Dipublikasikan',
                    'diarsipkan' => 'Diarsipkan',
                ])->label('Status Data'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
