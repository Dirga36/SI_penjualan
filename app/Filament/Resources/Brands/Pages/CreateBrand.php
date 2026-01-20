<?php

namespace App\Filament\Resources\Brands\Pages;

use App\Filament\Resources\Brands\BrandResource;
use Filament\Resources\Pages\CreateRecord;

// Halaman untuk membuat brand baru
class CreateBrand extends CreateRecord
{
    // Resource yang digunakan oleh halaman ini
    protected static string $resource = BrandResource::class;
}
