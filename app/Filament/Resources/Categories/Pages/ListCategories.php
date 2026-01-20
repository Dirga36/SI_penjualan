<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

// Halaman untuk menampilkan daftar kategori
class ListCategories extends ListRecords
{
    // Resource yang digunakan oleh halaman ini
    protected static string $resource = CategoryResource::class;

    // Mendefinisikan aksi-aksi yang tersedia di header halaman
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(), // Tombol untuk membuat kategori baru
        ];
    }
}
