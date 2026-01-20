<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

// Halaman untuk mengedit kategori
class EditCategory extends EditRecord
{
    // Resource yang digunakan oleh halaman ini
    protected static string $resource = CategoryResource::class;

    // Mendefinisikan aksi-aksi yang tersedia di header halaman
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),       // Tombol untuk soft delete kategori
            ForceDeleteAction::make(),  // Tombol untuk hapus permanen kategori
            RestoreAction::make(),      // Tombol untuk restore kategori yang terhapus
        ];
    }
}
