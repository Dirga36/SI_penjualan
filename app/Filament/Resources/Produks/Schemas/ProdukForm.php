<?php

namespace App\Filament\Resources\Produks\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
// use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

// Konfigurasi form untuk produk
class ProdukForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Section untuk informasi utama produk
                Fieldset::make('Product Information')
                    ->columns(2)
                    ->schema([
                        // Input untuk nama produk
                        TextInput::make('name')
                            ->label('Name')
                            ->required()        // Wajib diisi
                            ->maxLength(255),   // Maksimal 255 karakter
                        // Input untuk harga produk
                        TextInput::make('price')
                            ->label('Price')
                            ->prefix('IDR')     // Prefix mata uang IDR
                            ->numeric()         // Hanya menerima angka
                            ->minValue(0)       // Nilai minimum 0
                            ->required(),       // Wajib diisi
                        // Upload file untuk thumbnail produk
                        FileUpload::make('thumbnail')
                            ->label('Thumbnail')
                            ->image()           // Hanya menerima file gambar
                            ->directory('products/thumbnails') // Disimpan di folder products/thumbnails
                            ->required(),       // Wajib diisi
                        // Repeater untuk mengelola foto-foto produk (relasi hasMany)
                        Repeater::make('photos')
                            ->label('Photos')
                            ->relationship('photos') // Relasi ke model ProdukPhoto
                            ->schema([
                                // Upload file untuk setiap foto
                                FileUpload::make('photo')
                                    ->label('Photo')
                                    ->image()   // Hanya menerima file gambar
                                    ->directory('products/photos') // Disimpan di folder products/photos
                                    ->required(), // Wajib diisi
                            ])
                            ->addActionLabel('Add to photos') // Label tombol tambah
                            ->grid(1),
                        // Repeater untuk mengelola ukuran-ukuran produk (relasi hasMany)
                        Repeater::make('sizes')
                            ->label('Sizes')
                            ->relationship('sizes')     // Relasi ke model ProdukSize
                            ->schema([
                                // Input untuk ukuran produk
                                TextInput::make('size')
                                    ->label('Size')
                                    ->required()        // Wajib diisi
                                    ->maxLength(50),    // Maksimal 50 karakter
                            ])
                            ->addActionLabel('Add to sizes') // Label tombol tambah
                            ->grid(1)
                            ->columnSpanFull(),
                        
                        // Section untuk informasi tambahan produk
                        Fieldset::make('Informasi Tambahan')
                            ->columns(2)
                            ->schema([
                                // Input untuk deskripsi produk
                                Textarea::make('about')
                                    ->label('About')
                                    ->rows(6)               // 6 baris textarea
                                    ->required(),           // Wajib diisi
                                // Grid untuk field-field tambahan
                                Grid::make(1)
                                    ->schema([
                                        // Toggle untuk menandai produk populer
                                        Toggle::make('is_popular')
                                            ->label('Is popular')
                                            ->default(false)    // Default tidak populer
                                            ->required(),       // Wajib diisi
                                        // Select untuk kategori produk (relasi belongsTo)
                                        Select::make('category_id')
                                            ->label('Category')
                                            ->relationship('category', 'name') // Relasi ke model Category
                                            ->searchable()      // Dapat dicari
                                            ->preload()         // Preload opsi kategori
                                            ->required(),       // Wajib diisi
                                        // Select untuk brand produk (relasi belongsTo)
                                        Select::make('brand_id')
                                            ->label('Brand')
                                            ->relationship('brand', 'name') // Relasi ke model Brand
                                            ->searchable()      // Dapat dicari
                                            ->preload()         // Preload opsi brand
                                            ->required(),       // Wajib diisi
                                        // Input untuk stok produk
                                        TextInput::make('stock')
                                            ->label('Stock')
                                            ->prefix('pcs')     // Prefix satuan pieces
                                            ->numeric()         // Hanya menerima angka
                                            ->minValue(0)       // Nilai minimum 0
                                            ->required(),       // Wajib diisi
                                    ]),
                            ])
                            ->columnSpanFull(),

                    ])
                    ->columnSpanFull(),
            ]);
    }
}
