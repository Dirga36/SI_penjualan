<?php

namespace App\Filament\Resources\ProductTransactions\Schemas;

use App\Models\ProductTransaction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

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
                                //->default(fn () => ProductTransaction::generateUniqueTrxId())
                                //->disabled()
                                //->dehydrated()
                                //->columnSpanFull()
                                ->required()
                                ->maxLength(200),

                            // Pilihan produk
                            Select::make('produk_id')
                                ->label('Product')
                                ->relationship('produk', 'name')
                                ->searchable()
                                ->preload()
                                ->required()
                                ->live()
                                ->afterStateUpdated(
                                    function ($state, callable $get, callable $set) {
                                        $produk = Produk::find($state);
                                        $price = $produk ? $produk->price : 0;
                                        $quantity = $get('quantity') ?? 1;
                                        $subTotalAmmount = $price * $quantity;

                                        $set('price', $price);
                                        $set('sub_total_ammount', $subTotalAmmount);

                                        $discount = $get('discount') ?? 0;
                                        $grandTotalAmmount = $subTotalAmmount - $discount;
                                        $set('grand_total_ammount', $grandTotalAmmount);

                                        $sizes = $produk ? $produk->sizes->pluck('size', 'id')->toArray() : [];
                                        $set('product_sizes', $sizes);
                                    }
                                )
                                ->afterStateHydrated(
                                    function ($state, callable $get, callable $set) {
                                        $produkID = $state;
                                        if ($produkID) {
                                            $produk = Produk::find($produkID);
                                            $sizes = $produk ? $produk->sizes->pluck('size', 'id')->toArray() : [];
                                            $set('product_sizes', $sizes);
                                        }
                                    }
                                ),

                            // Ukuran produk
                            Select::make('product_size')
                                ->label('Quantity')
                                ->required()
                                ->live()
                                ->options(
                                    function (callable $get) {
                                        $sizes = $get('product_size');

                                        return is_array($sizes) ? $sizes : [];
                                    }
                                ),

                            // Jumlah item
                            TextInput::make('quantity')
                                ->label('Quantity')
                                ->prefix('Qty')
                                ->numeric()
                                ->required()
                                ->live()
                                ->afterStateUpdated(
                                    function ($state, callable $get, callable $set) {
                                        $price = $get('price');
                                        $quantity = $state;
                                        $subTotalAmmount = $price * $quantity;
                                        $set('sub_total_ammount', $subTotalAmmount);
                                        $discount = $get('discount') ?? 0;
                                        $grandTotalAmmount = $subTotalAmmount - $discount;
                                        $set('grand_total_ammount', $grandTotalAmmount);
                                    }
                                ),

                            // Kode promo (opsional)
                            Select::make('promo_code_id')
                                ->label('Promo Code')
                                ->relationship('promoCode', 'code')
                                ->searchable()
                                ->preload()
                                ->nullable()
                                ->live()
                                ->afterStateUpdated(
                                    function ($state, callable $get, callable $set) {
                                        $price = $get('price');
                                        $quantity = $state;
                                        $subTotalAmmount = $price * $quantity;
                                        $set('sub_total_ammount', $subTotalAmmount);
                                        $discount = $get('discount') ?? 0;
                                        $grandTotalAmmount = $subTotalAmmount - $discount;
                                        $set('grand_total_ammount', $grandTotalAmmount);
                                    }
                                ),
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
                                ->maxLength(20),
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
                                ->maxLength(100),

                            TextInput::make('post_code')
                                ->label('Post Code')
                                ->required()
                                ->maxLength(20),

                            Textarea::make('address')
                                ->label('Full Address')
                                ->rows(3)
                                ->required()
                                ->columnSpanFull()
                                ->maxLength(500),
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
                                ->required()
                                ->readOnly(),

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
                                ->required()
                                ->readOnly(),

                            ToggleButtons::make('is_paid')
                                ->label('Apakah Sudah Membayar')
                                ->boolean()
                                ->grouped()
                                ->icons([
                                    true => Heroicon::OutlinedPencil,
                                    false => Heroicon::OutlinedClock,
                                ])
                                //->onColor('success')
                                //->offColor('danger')
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
