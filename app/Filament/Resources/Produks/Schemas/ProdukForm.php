<?php

namespace App\Filament\Resources\Produks\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProdukForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(1)->schema([
                    Section::make('Product Information')
                        ->columns(2)
                        ->schema([
                            Grid::make(2)
                                ->schema([
                                    TextInput::make('name')
                                        ->label('Name')
                                        ->required()
                                        ->maxLength(255),
                                    TextInput::make('price')
                                        ->label('Price')
                                        ->numeric()
                                        ->minValue(0)
                                        ->required(),
                                ])
                                ->columnSpanFull(),
                            Grid::make(2)
                                ->schema([
                                    FileUpload::make('thumbnail')
                                        ->label('Thumbnail')
                                        ->image()
                                        ->directory('products/thumbnails')
                                        ->required(),
                                    Repeater::make('photos')
                                        ->label('Photos')
                                        ->relationship('photos')
                                        ->schema([
                                            FileUpload::make('photo')
                                                ->label('Photo')
                                                ->image()
                                                ->directory('products/photos')
                                                ->required(),
                                        ])
                                        ->addActionLabel('Add to photos')
                                        ->grid(1),
                                ])
                                ->columnSpanFull(),
                            Repeater::make('sizes')
                                ->label('Sizes')
                                ->relationship('sizes')
                                ->schema([
                                    TextInput::make('size')
                                        ->label('Size')
                                        ->required()
                                        ->maxLength(50),
                                ])
                                ->addActionLabel('Add to sizes')
                                ->grid(1)
                                ->columnSpanFull(),]),
                ]),
                Grid::make(1)->schema([
                    Section::make('Informasi Tambahan')
                        ->columns(2)
                        ->schema([
                            Textarea::make('about')
                                ->label('About')
                                ->rows(6)
                                ->required(),
                            Grid::make(1)
                                ->schema([
                                    Toggle::make('is_popular')
                                        ->label('Is popular')
                                        ->default(false)
                                        ->required(),
                                    Select::make('category_id')
                                        ->label('Category')
                                        ->relationship('category', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->required(),
                                    Select::make('brand_id')
                                        ->label('Brand')
                                        ->relationship('brand', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->required(),
                                    TextInput::make('stock')
                                        ->label('Stock')
                                        ->numeric()
                                        ->minValue(0)
                                        ->required(),
                                ]),
                        ]),
                ])
            ]);
    }
}
