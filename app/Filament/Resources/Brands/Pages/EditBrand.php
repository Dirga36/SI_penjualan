<?php

namespace App\Filament\Resources\Brands\Pages;

use App\Filament\Resources\Brands\BrandResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

// Halaman untuk mengedit brand
class EditBrand extends EditRecord
{
    // Resource yang digunakan oleh halaman ini
    protected static string $resource = BrandResource::class;

    // Mendefinisikan aksi-aksi yang tersedia di header halaman
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),       // Tombol untuk soft delete brand
            ForceDeleteAction::make(),  // Tombol untuk hapus permanen brand
            RestoreAction::make(),      // Tombol untuk restore brand yang terhapus
        ];
    }
}
