<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                //TextColumn::make('email_verified_at')
                //    ->dateTime()
                //    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime('d M Y, H:i') // Format tanggal dan waktu
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime('d M Y, H:i') // Format tanggal dan waktu
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),   // Tombol untuk melihat detail
                EditAction::make(),   // Tombol untuk mengedit
                DeleteAction::make(), // Tombol untuk menghapus
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),       // Hapus banyak data sekaligus
                    ForceDeleteBulkAction::make(),  // Hapus permanen banyak data
                    RestoreBulkAction::make(),      // Restore banyak data yang terhapus
                ]),
            ]);
    }
}
