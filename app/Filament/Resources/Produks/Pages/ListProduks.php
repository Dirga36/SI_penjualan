<?php

namespace App\Filament\Resources\Produks\Pages;

use App\Filament\Resources\Produks\ProdukResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

// Halaman untuk menampilkan daftar produk
class ListProduks extends ListRecords
{
    // Resource yang digunakan oleh halaman ini
    protected static string $resource = ProdukResource::class;

    // Mendefinisikan aksi-aksi yang tersedia di header halaman
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(), // Tombol untuk membuat produk baru
        ];
    }
}
