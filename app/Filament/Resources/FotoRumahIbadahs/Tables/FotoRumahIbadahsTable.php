<?php

namespace App\Filament\Resources\FotoRumahIbadahs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FotoRumahIbadahsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('file_path')->label('Foto'),
                TextColumn::make('rumahIbadah.nama')->label('Rumah Ibadah')->searchable(),
                TextColumn::make('keterangan')->searchable(),
                IconColumn::make('is_utama')->boolean()->label('Utama'),
            ])
            ->filters([
                //
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
