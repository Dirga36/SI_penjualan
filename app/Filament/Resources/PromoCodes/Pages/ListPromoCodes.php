<?php

namespace App\Filament\Resources\PromoCodes\Pages;

use App\Filament\Resources\PromoCodes\PromoCodeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

// Halaman untuk menampilkan daftar kode promo
class ListPromoCodes extends ListRecords
{
    // Resource yang digunakan oleh halaman ini
    protected static string $resource = PromoCodeResource::class;

    // Mendefinisikan aksi-aksi yang tersedia di header halaman
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(), // Tombol untuk membuat kode promo baru
        ];
    }
}
