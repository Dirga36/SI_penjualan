<?php

namespace App\Filament\Resources\Produks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

// Konfigurasi tabel untuk menampilkan daftar produk
class ProduksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            // Kolom-kolom yang ditampilkan di tabel
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->square()              // Bentuk persegi
                    ->toggleable(isToggledHiddenByDefault: true), // Dapat disembunyikan, default tersembunyi
                TextColumn::make('name')
                    ->searchable()          // Dapat dicari
                    ->sortable(),           // Dapat diurutkan
                TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable()            // Dapat diurutkan
                    ->toggleable(),         // Dapat disembunyikan/ditampilkan
                TextColumn::make('brand.name')
                    ->label('Brand')
                    ->sortable()            // Dapat diurutkan
                    ->toggleable(),         // Dapat disembunyikan/ditampilkan
                TextColumn::make('price')
                    ->label('Price')
                    ->money('IDR')          // Format mata uang IDR
                    ->sortable(),           // Dapat diurutkan
                TextColumn::make('stock')
                    ->label('Stock')
                    ->suffix(' pc(s)')
                    ->sortable(),           // Dapat diurutkan

                IconColumn::make('is_popular')
                    ->label('Popular')
                    ->boolean()             // Tampil sebagai ikon boolean
                    // ->trueColor('success')
                    // ->falseColor('danger')
                    ->trueIcon(Heroicon::OutlinedCheckCircle)
                    ->falseIcon(Heroicon::OutlinedExclamationCircle),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()            // Format tanggal dan waktu
                    ->sortable()            // Dapat diurutkan
                    ->toggleable(isToggledHiddenByDefault: true), // Dapat disembunyikan, default tersembunyi
            ])
            // Filter untuk tabel
            ->filters([
                TrashedFilter::make(), // Filter untuk menampilkan data yang sudah dihapus
                SelectFilter::make('category')
                    ->relationship('category', 'name') // Filter berdasarkan kategori
                    ->label('category'),
                SelectFilter::make('brand')
                    ->relationship('brand', 'name')    // Filter berdasarkan brand
                    ->label('brand'),
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
