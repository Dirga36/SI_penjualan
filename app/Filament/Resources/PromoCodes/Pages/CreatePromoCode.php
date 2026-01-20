<?php

namespace App\Filament\Resources\PromoCodes\Pages;

use App\Filament\Resources\PromoCodes\PromoCodeResource;
use Filament\Resources\Pages\CreateRecord;

// Halaman untuk membuat kode promo baru
class CreatePromoCode extends CreateRecord
{
    // Resource yang digunakan oleh halaman ini
    protected static string $resource = PromoCodeResource::class;
}
