<?php

namespace App\Filament\Resources\PromoCodes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PromoCodeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->required()
                    ->maxLength(255),
                TextInput::make('discount_ammount')
                    ->label('Discount Ammount')
                    ->required()
                    ->numeric()
                    ->prefix('IDR')
                    ->minValue(0),
            ]);
    }
}
