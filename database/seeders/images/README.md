# Sample Images untuk Database Seeding

Direktori ini berisi sample images yang digunakan oleh factories saat seeding database.

## Struktur Direktori

```
images/
├── products/     # Gambar produk (thumbnail dan foto detail)
├── brands/       # Logo brand
├── categories/   # Icon kategori
└── proofs/       # Bukti pembayaran transaksi
```

## Cara Penggunaan

1. **Tambahkan gambar sample** ke direktori yang sesuai:
   - `products/` - untuk thumbnail dan foto produk (disarankan: 300x300 atau 400x400 pixels)
   - `brands/` - untuk logo brand (disarankan: 150x150 pixels)
   - `categories/` - untuk icon kategori (disarankan: 100x100 pixels)
   - `proofs/` - untuk bukti pembayaran (disarankan: 400x400 pixels)

2. **Format yang didukung**: JPG, JPEG, PNG, GIF, WEBP

3. **Contoh nama file**:
   - `products/sepatu-1.jpg`, `products/sepatu-2.png`
   - `brands/nike.png`, `brands/adidas.jpg`
   - `categories/sneakers.png`, `categories/boots.jpg`
   - `proofs/payment-1.jpg`, `proofs/payment-2.png`

## Fallback

Jika tidak ada gambar di direktori ini, factories akan menggunakan:
- **Placeholder images** dari faker (`imageUrl()`) sebagai fallback
- Ini memastikan seeding tetap bisa berjalan meskipun tanpa local images

## Catatan

- Gambar akan di-copy ke `storage/app/public/` saat seeding
- Pastikan menjalankan `php artisan storage:link` untuk membuat symbolic link
- Gambar dalam direktori ini **tidak perlu** di-commit ke repository (hanya struktur folder)
