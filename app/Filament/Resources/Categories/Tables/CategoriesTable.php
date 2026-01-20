<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

// Konfigurasi tabel untuk menampilkan daftar kategori
class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            // Kolom-kolom yang ditampilkan di tabel
            ->columns([
                TextColumn::make('name')->searchable(),  // Kolom nama dengan fitur pencarian
                ImageColumn::make('icon')->circular(),   // Kolom ikon berbentuk bulat
            ])
            // Filter untuk tabel
            ->filters([
                TrashedFilter::make(), // Filter untuk menampilkan data yang sudah dihapus
            ])
            // Aksi yang tersedia untuk setiap baris data
            ->recordActions([
                ViewAction::make(),   // Tombol untuk melihat detail
                EditAction::make(),   // Tombol untuk mengedit
                DeleteAction::make(), // Tombol untuk menghapus
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
