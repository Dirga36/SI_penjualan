<?php

namespace App\Filament\Resources\Produks\Pages;

use App\Filament\Resources\Produks\ProdukResource;
use Filament\Resources\Pages\CreateRecord;

// Halaman untuk membuat produk baru
class CreateProduk extends CreateRecord
{
    // Resource yang digunakan oleh halaman ini
    protected static string $resource = ProdukResource::class;
}
