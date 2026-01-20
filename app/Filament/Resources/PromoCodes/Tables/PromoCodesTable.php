<?php

namespace App\Filament\Resources\PromoCodes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

// Konfigurasi tabel untuk menampilkan daftar kode promo
class PromoCodesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            // Kolom-kolom yang ditampilkan di tabel
            ->columns([
                TextColumn::make('code')->searchable(),  // Kolom kode promo dengan fitur pencarian
                TextColumn::make('discount_ammount')
                    ->label('Discount Ammount')
                    ->money('IDR')          // Format mata uang IDR
                    ->sortable(),           // Dapat diurutkan
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime('d M Y, H:i') // Format tanggal dan waktu
                    ->sortable(),           // Dapat diurutkan
            ])
            // Filter untuk tabel
            ->filters([
                TrashedFilter::make(), // Filter untuk menampilkan data yang sudah dihapus
            ])
            // Aksi yang tersedia untuk setiap baris data
            ->recordActions([
                EditAction::make(),   // Tombol untuk mengedit
            ])
            // Aksi massal yang bisa dilakukan pada data terpilih
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),       // Hapus banyak data sekaligus
                    ForceDeleteBulkAction::make(),  // Hapus permanen banyak data
                    RestoreBulkAction::make(),      // Restore banyak data yang terhapus
                ]),
            ]);
    }
}
