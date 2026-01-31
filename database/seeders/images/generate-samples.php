<?php

/**
 * Script untuk membuat sample images untuk testing factories.
 * Menjalankan script ini akan membuat sample images di database/seeders/images/
 */

function createSampleImage($path, $width, $height, $color, $text)
{
    $image = imagecreatetruecolor($width, $height);
    
    // Set background color
    list($r, $g, $b) = $color;
    $bgColor = imagecolorallocate($image, $r, $g, $b);
    imagefill($image, 0, 0, $bgColor);
    
    // Add text
    $textColor = imagecolorallocate($image, 255, 255, 255);
    $fontSize = 5;
    $textWidth = imagefontwidth($fontSize) * strlen($text);
    $textHeight = imagefontheight($fontSize);
    $x = ($width - $textWidth) / 2;
    $y = ($height - $textHeight) / 2;
    imagestring($image, $fontSize, $x, $y, $text, $textColor);
    
    // Save image
    imagejpeg($image, $path, 90);
    imagedestroy($image);
    
    echo "Created: $path\n";
}

$baseDir = __DIR__;

// Create product images (5 samples)
$productColors = [
    [44, 62, 80],   // Dark blue
    [52, 152, 219], // Blue
    [46, 204, 113], // Green
    [241, 196, 15], // Yellow
    [231, 76, 60],  // Red
];

for ($i = 1; $i <= 5; $i++) {
    createSampleImage(
        "$baseDir/products/product-$i.jpg",
        400,
        400,
        $productColors[$i - 1],
        "Product $i"
    );
}

// Create brand logos (5 samples)
$brandColors = [
    [26, 188, 156], // Turquoise
    [155, 89, 182], // Purple
    [52, 73, 94],   // Dark gray
    [243, 156, 18], // Orange
    [192, 57, 43],  // Dark red
];

for ($i = 1; $i <= 5; $i++) {
    createSampleImage(
        "$baseDir/brands/brand-$i.jpg",
        150,
        150,
        $brandColors[$i - 1],
        "Brand $i"
    );
}

// Create category icons (5 samples)
$categoryColors = [
    [149, 165, 166], // Gray
    [41, 128, 185],  // Blue
    [39, 174, 96],   // Green
    [230, 126, 34],  // Orange
    [142, 68, 173],  // Purple
];

for ($i = 1; $i <= 5; $i++) {
    createSampleImage(
        "$baseDir/categories/category-$i.jpg",
        100,
        100,
        $categoryColors[$i - 1],
        "Cat $i"
    );
}

// Create payment proofs (3 samples)
$proofColors = [
    [127, 140, 141], // Gray
    [44, 62, 80],    // Dark blue
    [22, 160, 133],  // Green
];

for ($i = 1; $i <= 3; $i++) {
    createSampleImage(
        "$baseDir/proofs/proof-$i.jpg",
        400,
        400,
        $proofColors[$i - 1],
        "Payment $i"
    );
}

echo "\nSelesai! Sample images berhasil dibuat.\n";
echo "Jalankan 'php artisan db:seed' untuk test factories dengan local images.\n";
