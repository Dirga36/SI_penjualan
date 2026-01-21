<?php

namespace App\Filament\Resources\ProductTransactions\Schemas;

use App\Models\ProductTransaction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

/**
 * Konfigurasi form untuk ProductTransaction
 * Form ini digunakan untuk membuat dan mengedit transaksi produk
 */
class ProductTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Section untuk informasi transaksi
                Grid::make(1)->schema([
                    Section::make('Transaction Information')
                        ->columns(2)
                        ->schema([
                            // ID Transaksi (auto-generate)
                            TextInput::make('booking_trx_id')
                                ->label('Booking Transaction ID')
                                ->default(fn () => ProductTransaction::generateUniqueTrxId())
                                ->disabled()
                                ->dehydrated()
                                ->required()
                                ->columnSpanFull(),

                            // Pilihan produk
                            Select::make('produk_id')
                                ->label('Product')
                                ->relationship('produk', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),

                            // Ukuran produk
                            TextInput::make('produk_size')
                                ->label('Product Size')
                                ->numeric()
                                ->required(),

                            // Jumlah item
                            TextInput::make('quantity')
                                ->label('Quantity')
                                ->numeric()
                                ->minValue(1)
                                ->default(1)
                                ->required(),

                            // Kode promo (opsional)
                            Select::make('promo_code_id')
                                ->label('Promo Code')
                                ->relationship('promoCode', 'code')
                                ->searchable()
                                ->preload()
                                ->nullable(),
                        ]),
                ]),

                // Section untuk informasi pelanggan
                Grid::make(1)->schema([
                    Section::make('Customer Information')
                        ->columns(2)
                        ->schema([
                            TextInput::make('name')
                                ->label('Customer Name')
                                ->required()
                                ->maxLength(255),

                            TextInput::make('email')
                                ->label('Email')
                                ->email()
                                ->required()
                                ->maxLength(255),

                            TextInput::make('phone')
                                ->label('Phone Number')
                                ->tel()
                                ->required()
                                ->maxLength(255),
                        ]),
                ]),

                // Section untuk informasi pengiriman
                Grid::make(1)->schema([
                    Section::make('Shipping Information')
                        ->columns(2)
                        ->schema([
                            TextInput::make('city')
                                ->label('City')
                                ->required()
                                ->maxLength(255),

                            TextInput::make('post_code')
                                ->label('Post Code')
                                ->required()
                                ->maxLength(255),

                            Textarea::make('address')
                                ->label('Full Address')
                                ->rows(3)
                                ->required()
                                ->columnSpanFull(),
                        ]),
                ]),

                // Section untuk informasi pembayaran
                Grid::make(1)->schema([
                    Section::make('Payment Information')
                        ->columns(2)
                        ->schema([
                            TextInput::make('sub_total_amount')
                                ->label('Sub Total')
                                ->prefix('IDR')
                                ->numeric()
                                ->minValue(0)
                                ->required(),

                            TextInput::make('discount_amount')
                                ->label('Discount Amount')
                                ->prefix('IDR')
                                ->numeric()
                                ->minValue(0)
                                ->default(0),

                            TextInput::make('grand_total_amount')
                                ->label('Grand Total')
                                ->prefix('IDR')
                                ->numeric()
                                ->minValue(0)
                                ->required(),

                            Toggle::make('is_paid')
                                ->label('Payment Status')
                                ->onColor('success')
                                ->offColor('danger')
                                ->default(false),

                            FileUpload::make('proof')
                                ->label('Payment Proof')
                                ->image()
                                ->directory('transactions/proofs')
                                ->required()
                                ->columnSpanFull(),
                        ]),
                ]),
            ]);
    }
}
