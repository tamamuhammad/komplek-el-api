<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label('Judul Artikel'),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->label('URL Slug'),
                Select::make('category')
                    ->options([
                        'Berita' => 'Berita',
                        'Opini' => 'Opini',
                        'Figur' => 'Figur',
                        'Kalam' => 'Kalam',
                    ])
                    ->required()
                    ->label('Kategori'),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->label('Isi Konten'),
            ]);
    }
}
