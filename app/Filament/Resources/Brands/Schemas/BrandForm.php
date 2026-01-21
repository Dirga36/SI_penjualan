<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

// Konfigurasi form untuk brand
class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Input untuk nama brand
                TextInput::make('name')
                    ->required()            // Wajib diisi
                    ->maxLength(255),       // Maksimal 255 karakter
                // Upload file untuk logo brand
                FileUpload::make('logo')
                    ->required()
                    ->image()               // Hanya menerima file gambar
                    ->directory('brands')   // Disimpan di folder brands
                    ->required()            // Wajib diisi
                    ->nullable(),           // Bisa null di database
            ]);
    }
}
