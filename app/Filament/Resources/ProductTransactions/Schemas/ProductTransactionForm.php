<?php

namespace App\Filament\Resources\ProductTransactions\Schemas;

use App\Models\ProductTransaction;
use App\Models\Produk;
use App\Models\PromoCode;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
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
                Wizard::make([
                    // Section untuk informasi transaksi
                    Step::make('Transaction Information')
                        ->schema([

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
                                        ->maxLength(200),

                                    // Pilihan produk
                                    /**
                                     * Ketika produk dipilih, lakukan perhitungan harga dan update field terkait:
                                     * - Ambil harga produk dari model Produk
                                     * - Hitung sub total: harga * jumlah
                                     * - Hitung grand total: sub total - diskon
                                     * - Update daftar ukuran produk
                                     */
                                    Select::make('produk_id')
                                        ->label('Product')
                                        ->relationship('produk', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->required()
                                        ->live()
                                        ->afterStateUpdated(
                                            function ($state, callable $get, callable $set) {
                                                // Ambil produk berdasarkan ID yang dipilih
                                                $produk = Produk::find($state);
                                                // Ambil harga produk, default 0 jika tidak ditemukan
                                                $price = $produk ? $produk->price : 0;
                                                // Ambil jumlah item, default 1 jika belum diisi
                                                $quantity = $get('quantity') ?? 1;
                                                // Hitung sub total harga
                                                $subTotalAmmount = $price * $quantity;

                                                // Set harga ke state
                                                $set('price', $price);
                                                // Set sub total ke state
                                                $set('sub_total_ammount', $subTotalAmmount);

                                                // Ambil diskon (jika ada), default 0
                                                $discount = $get('discount_ammount') ?? 0;
                                                // Hitung grand total: sub total - diskon
                                                $grandTotalAmmount = $subTotalAmmount - $discount;
                                                // Set grand total ke state
                                                $set('grand_total_ammount', $grandTotalAmmount);

                                                // Ambil daftar ukuran produk
                                                $sizes = $produk ? $produk->sizes->pluck('size', 'id')->toArray() : [];
                                                $set('produk_sizes', $sizes);
                                            }
                                        )
                                        ->afterStateHydrated(
                                            function ($state, callable $get, callable $set) {
                                                // Saat form di-load, update daftar ukuran produk sesuai produk yang dipilih
                                                $produkID = $state;
                                                if ($produkID) {
                                                    $produk = Produk::find($produkID);
                                                    $sizes = $produk ? $produk->sizes->pluck('size', 'id')->toArray() : [];
                                                    $set('produk_sizes', $sizes);
                                                }
                                            }
                                        ),

                                    // Ukuran produk
                                    Select::make('produk_size')
                                        ->label('Produk Size')
                                        ->required()
                                        ->live()
                                        ->options(
                                            function (callable $get) {
                                                // Ambil daftar ukuran produk dari state
                                                $sizes = $get('produk_sizes');

                                                return is_array($sizes) ? $sizes : [];
                                            }
                                        ),

                                    // Jumlah item
                                    /**
                                     * Setiap kali jumlah diubah, lakukan perhitungan ulang sub total dan grand total:
                                     * - sub total = harga * jumlah
                                     * - grand total = sub total - diskon
                                     */
                                    TextInput::make('quantity')
                                        ->label('Quantity')
                                        ->prefix('Qty')
                                        ->numeric()
                                        ->required()
                                        ->live()
                                        ->afterStateUpdated(
                                            function ($state, callable $get, callable $set) {
                                                // Ambil harga dari state
                                                $price = $get('price');
                                                // Jumlah item yang diinput
                                                $quantity = $state;
                                                // Hitung sub total
                                                $subTotalAmmount = $price * $quantity;
                                                $set('sub_total_ammount', $subTotalAmmount);
                                                // Ambil diskon
                                                $discount = $get('discount_ammount') ?? 0;
                                                // Hitung grand total
                                                $grandTotalAmmount = $subTotalAmmount - $discount;
                                                $set('grand_total_ammount', $grandTotalAmmount);
                                            }
                                        ),

                                    // Kode promo (opsional)
                                    /**
                                     * Jika kode promo dipilih, ambil nilai diskon dari PromoCode dan update grand total:
                                     * - diskon = promoCode->discount_ammount
                                     * - grand total = sub total - diskon
                                     */
                                    Select::make('promo_code_id')
                                        ->label('Promo Code')
                                        ->relationship('promoCode', 'code')
                                        ->searchable()
                                        ->preload()
                                        // ->nullable()
                                        ->live()
                                        ->afterStateUpdated(
                                            function ($state, callable $get, callable $set) {
                                                // Ambil sub total dari state
                                                $subTotalAmmount = $get('sub_total_ammount');
                                                // Cari promo code berdasarkan ID
                                                $promoCode = PromoCode::find($state);
                                                // Ambil nilai diskon
                                                $discount = $promoCode ? $promoCode->discount_ammount : 0;
                                                $set('discount_ammount', $discount); // Set diskon ke state
                                                // Hitung grand total
                                                $grandTotalAmmount = $subTotalAmmount - $discount;
                                                $set('grand_total_ammount', $grandTotalAmmount);
                                            }
                                        )
                                        ->afterStateHydrated(
                                            function ($state, callable $get, callable $set) {
                                                // Untuk menampilkan diskon saat edit form
                                                if ($state) {
                                                    $promoCode = PromoCode::find($state);
                                                    $discount = $promoCode ? $promoCode->discount_ammount : 0;
                                                    $set('discount_ammount', $discount);
                                                }
                                            }
                                        ),
                                ]),

                        ]),
                    // Section untuk informasi pelanggan
                    Step::make('Customer Information')
                        ->schema([

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
                    Step::make('Shipping Information')
                        ->schema([

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
                    Step::make('Payment Information')
                        ->schema([

                            Section::make('Payment Information')
                                ->columns(2)
                                ->schema([
                                    TextInput::make('sub_total_ammount')
                                        ->label('Sub Total')
                                        ->prefix('IDR')
                                        ->numeric()
                                        // ->minValue(0)
                                        // ->required()
                                        ->readOnly(),

                                    TextInput::make('discount_ammount')
                                        ->label('Discount Amount')
                                        ->prefix('IDR')
                                        ->numeric()
                                        ->readOnly(),

                                    TextInput::make('grand_total_ammount')
                                        ->label('Grand Total')
                                        ->prefix('IDR')
                                        ->numeric()
                                        // ->minValue(0)
                                        // ->required()
                                        ->readOnly(),

                                    ToggleButtons::make('is_paid')
                                        ->label('Has Paid?')
                                        ->boolean()
                                        ->grouped()
                                        ->icons([
                                            true => Heroicon::OutlinedPencil,
                                            false => Heroicon::OutlinedClock,
                                        ])
                                        // ->onColor('success')
                                        // ->offColor('danger')
                                        ->default(false),

                                    FileUpload::make('proof')
                                        ->label('Payment Proof')
                                        ->image()
                                        ->directory('transactions/proofs')
                                        ->required()
                                        ->columnSpanFull(),
                                ]),

                        ]),
                ])
                    ->columns(1)
                    ->columnSpanFull(),

            ]);
    }
}
