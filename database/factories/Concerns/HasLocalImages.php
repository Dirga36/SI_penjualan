<?php

namespace Database\Factories\Concerns;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Trait HasLocalImages
 *
 * Helper trait untuk factories yang menggunakan local images
 * sebagai pengganti faker placeholder images.
 */
trait HasLocalImages
{
    /**
     * Mendapatkan path gambar lokal atau fallback ke faker placeholder.
     *
     * @param string $subdirectory Subdirektori dalam database/seeders/images/ (contoh: 'products', 'brands')
     * @param int $width Lebar placeholder jika fallback ke faker
     * @param int $height Tinggi placeholder jika fallback ke faker
     * @param string $category Kategori faker image (contoh: 'fashion', 'business')
     * @return string Path relatif gambar atau URL placeholder
     */
    protected function getLocalImage(
        string $subdirectory,
        int $width = 400,
        int $height = 400,
        string $category = 'fashion'
    ): string {
        // Path ke direktori sample images
        $sourceDir = database_path("seeders/images/{$subdirectory}");

        // Cek apakah direktori exists
        if (!File::exists($sourceDir)) {
            // Fallback ke faker placeholder
            return $this->faker->imageUrl($width, $height, $category);
        }

        // Ambil semua file gambar dari direktori
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $images = [];

        foreach ($imageExtensions as $ext) {
            $files = File::glob("{$sourceDir}/*.{$ext}");
            if ($files) {
                $images = array_merge($images, $files);
            }
        }

        // Jika tidak ada gambar, fallback ke faker
        if (empty($images)) {
            return $this->faker->imageUrl($width, $height, $category);
        }

        // Pilih gambar random
        $sourceImage = $images[array_rand($images)];

        // Generate nama file unik untuk storage
        $extension = pathinfo($sourceImage, PATHINFO_EXTENSION);
        $filename = Str::random(40) . '.' . $extension;
        $storagePath = "{$subdirectory}/{$filename}";

        // Copy gambar ke storage/app/public
        $destinationPath = storage_path("app/public/{$storagePath}");

        // Pastikan direktori tujuan ada
        $destinationDir = dirname($destinationPath);
        if (!File::exists($destinationDir)) {
            File::makeDirectory($destinationDir, 0755, true);
        }

        // Copy file
        File::copy($sourceImage, $destinationPath);

        // Return path relatif untuk disimpan di database
        return $storagePath;
    }
}
