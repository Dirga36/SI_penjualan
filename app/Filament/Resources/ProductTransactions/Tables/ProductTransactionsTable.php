<?php

namespace App\Filament\Resources\ProductTransactions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

/**
 * Konfigurasi tabel untuk menampilkan daftar transaksi produk
 */
class ProductTransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            // Kolom-kolom yang ditampilkan di tabel
            ->columns([
                // ID Transaksi
                TextColumn::make('booking_trx_id')
                    ->label('Transaction ID')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Transaction ID copied'),

                // Nama Pelanggan
                TextColumn::make('name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),

                // Nama Produk (relasi)
                TextColumn::make('produk.name')
                    ->label('Product')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                // Ukuran Produk
                TextColumn::make('produk_size')
                    ->label('Size')
                    ->sortable()
                    ->toggleable(),

                // Jumlah
                TextColumn::make('quantity')
                    ->label('Qty')
                    ->sortable()
                    ->alignCenter(),

                // Grand Total
                TextColumn::make('grand_total_amount')
                    ->label('Total')
                    ->money('IDR')
                    ->sortable(),

                // Diskon
                TextColumn::make('discount_amount')
                    ->label('Discount')
                    ->money('IDR')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                // Kode Promo (relasi)
                TextColumn::make('promoCode.code')
                    ->label('Promo Code')
                    ->badge()
                    ->color('success')
                    ->toggleable(isToggledHiddenByDefault: true),

                // Status Pembayaran
                IconColumn::make('is_paid')
                    ->label('Paid')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                // Bukti Pembayaran
                ImageColumn::make('proof')
                    ->label('Proof')
                    ->square()
                    ->toggleable(isToggledHiddenByDefault: true),

                // Email
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                // Telepon
                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                // Kota
                TextColumn::make('city')
                    ->label('City')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                // Tanggal Dibuat
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            // Filter untuk tabel
            ->filters([
                TrashedFilter::make(),

                // Filter berdasarkan status pembayaran
                SelectFilter::make('is_paid')
                    ->label('Payment Status')
                    ->options([
                        '1' => 'Paid',
                        '0' => 'Unpaid',
                    ]),

                // Filter berdasarkan produk
                SelectFilter::make('produk')
                    ->relationship('produk', 'name'),

                // Filter berdasarkan kode promo
                SelectFilter::make('promo_code')
                    ->relationship('promoCode', 'code'),
            ])
            // Default sorting berdasarkan tanggal terbaru
            ->defaultSort('created_at', 'desc')
            // Aksi yang tersedia untuk setiap baris data
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            // Bulk action yang bisa dilakukan pada data terpilih
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
