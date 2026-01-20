<?php

namespace App\Filament\Resources\Produks\Pages;

use App\Filament\Resources\Produks\ProdukResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

// Halaman untuk mengedit produk
class EditProduk extends EditRecord
{
    // Resource yang digunakan oleh halaman ini
    protected static string $resource = ProdukResource::class;

    // Mendefinisikan aksi-aksi yang tersedia di header halaman
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),       // Tombol untuk soft delete produk
            ForceDeleteAction::make(),  // Tombol untuk hapus permanen produk
            RestoreAction::make(),      // Tombol untuk restore produk yang terhapus
        ];
    }
}
