<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use Filament\Resources\Pages\CreateRecord;

// Halaman untuk membuat kategori baru
class CreateCategory extends CreateRecord
{
    // Resource yang digunakan oleh halaman ini
    protected static string $resource = CategoryResource::class;
}
