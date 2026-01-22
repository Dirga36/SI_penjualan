<?php

namespace App\Filament\Resources\ProductTransactions\Pages;

use App\Filament\Resources\ProductTransactions\ProductTransactionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

// Halaman untuk mengedit transaksi produk
class EditProductTransaction extends EditRecord
{
    // Resource yang digunakan oleh halaman ini
    protected static string $resource = ProductTransactionResource::class;

    // Mendefinisikan aksi-aksi yang tersedia di header halaman
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),       // Tombol untuk soft delete transaksi produk
            ForceDeleteAction::make(),  // Tombol untuk hapus permanen transaksi produk
            RestoreAction::make(),      // Tombol untuk restore transaksi produk yang terhapus
        ];
    }
}
