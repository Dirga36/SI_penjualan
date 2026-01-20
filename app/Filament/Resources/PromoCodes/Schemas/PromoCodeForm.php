<?php

namespace App\Filament\Resources\PromoCodes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

// Konfigurasi form untuk kode promo
class PromoCodeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Input untuk kode promo
                TextInput::make('code')
                    ->required()            // Wajib diisi
                    ->maxLength(255),       // Maksimal 255 karakter
                // Input untuk jumlah diskon
                TextInput::make('discount_ammount')
                    ->label('Discount Ammount')
                    ->required()            // Wajib diisi
                    ->numeric()             // Hanya menerima angka
                    ->prefix('IDR')         // Prefix mata uang IDR
                    ->minValue(0),          // Nilai minimum 0
            ]);
    }
}
