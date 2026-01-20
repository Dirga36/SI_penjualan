<?php

namespace App\Filament\Resources\PromoCodes\Pages;

use App\Filament\Resources\PromoCodes\PromoCodeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

// Halaman untuk mengedit kode promo
class EditPromoCode extends EditRecord
{
    // Resource yang digunakan oleh halaman ini
    protected static string $resource = PromoCodeResource::class;

    // Mendefinisikan aksi-aksi yang tersedia di header halaman
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),       // Tombol untuk soft delete kode promo
            ForceDeleteAction::make(),  // Tombol untuk hapus permanen kode promo
            RestoreAction::make(),      // Tombol untuk restore kode promo yang terhapus
        ];
    }
}
