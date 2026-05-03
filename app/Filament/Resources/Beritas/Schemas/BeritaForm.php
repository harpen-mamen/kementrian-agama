<?php

namespace App\Filament\Resources\Beritas\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kategori_berita_id')->relationship('kategoriBerita', 'nama')->searchable()->preload(),
                TextInput::make('judul')->required()->maxLength(255),
                TextInput::make('slug')->required()->unique(ignoreRecord: true)->maxLength(255),
                Textarea::make('ringkasan')->columnSpanFull(),
                RichEditor::make('isi')->required()->columnSpanFull(),
                FileUpload::make('gambar')->image()->directory('berita'),
                Select::make('status')->options([
                    'draft' => 'Draft',
                    'published' => 'Published',
                    'archived' => 'Archived',
                ])->default('draft')->required(),
                DateTimePicker::make('published_at'),
            ]);
    }
}
