<?php

namespace App\Filament\Resources\ProductTransactions\Pages;

use App\Filament\Resources\ProductTransactions\ProductTransactionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

// Halaman untuk menampilkan daftar transaksi produk
class ListProductTransactions extends ListRecords
{
    // Resource yang digunakan oleh halaman ini
    protected static string $resource = ProductTransactionResource::class;

    // Mendefinisikan aksi-aksi yang tersedia di header halaman
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(), // Tombol untuk membuat transaksi produk baru
        ];
    }
}
