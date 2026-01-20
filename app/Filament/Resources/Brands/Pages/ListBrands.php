<?php

namespace App\Filament\Resources\Brands\Pages;

use App\Filament\Resources\Brands\BrandResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

// Halaman untuk menampilkan daftar brand
class ListBrands extends ListRecords
{
    // Resource yang digunakan oleh halaman ini
    protected static string $resource = BrandResource::class;

    // Mendefinisikan aksi-aksi yang tersedia di header halaman
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(), // Tombol untuk membuat brand baru
        ];
    }
}
