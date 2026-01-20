<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

// Konfigurasi form untuk kategori
class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Input untuk nama kategori
                TextInput::make('name')
                    ->required()            // Wajib diisi
                    ->maxLength(255),       // Maksimal 255 karakter
                // Upload file untuk ikon kategori
                FileUpload::make('icon')
                    ->image()               // Hanya menerima file gambar
                    ->directory('categories') // Disimpan di folder categories
                    ->required()            // Wajib diisi
                    ->nullable(),           // Bisa null di database
            ]);
    }
}
