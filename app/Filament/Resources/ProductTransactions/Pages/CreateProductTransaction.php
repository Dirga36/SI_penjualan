<?php

namespace App\Filament\Resources\ProductTransactions\Pages;

use App\Filament\Resources\ProductTransactions\ProductTransactionResource;
use Filament\Resources\Pages\CreateRecord;

// Halaman untuk membuat transaksi produk baru
class CreateProductTransaction extends CreateRecord
{
    // Resource yang digunakan oleh halaman ini
    protected static string $resource = ProductTransactionResource::class;
}
