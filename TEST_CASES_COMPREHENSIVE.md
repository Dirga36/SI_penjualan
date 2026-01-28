# Kasus Uji Lengkap untuk SI Penjualan

**Versi Dokumen**: 1.0  
**Terakhir Diperbarui**: 28 Januari 2026  
**Status**: Lengkap dengan Kasus Uji Positif dan Negatif

---

## Daftar Isi
1. [Struktur Kasus Uji](#struktur-kasus-uji)
2. [Kasus Uji Manajemen Kategori](#kasus-uji-manajemen-kategori)
3. [Kasus Uji Manajemen Brand](#kasus-uji-manajemen-brand)
4. [Kasus Uji Manajemen Produk](#kasus-uji-manajemen-produk)
5. [Kasus Uji Manajemen Kode Promo](#kasus-uji-manajemen-kode-promo)
6. [Kasus Uji Transaksi Produk](#kasus-uji-transaksi-produk)
7. [Kasus Uji Foto Produk](#kasus-uji-foto-produk)
8. [Kasus Uji Ukuran Produk](#kasus-uji-ukuran-produk)

---

## Struktur Kasus Uji

Setiap kasus uji mengikuti format berikut:

| Kolom | Deskripsi |
|--------|-------------|
| ID Uji | Identifikasi unik (TC_[Modul]_[Nomor]) |
| Nama Uji | Nama uji yang deskriptif |
| Modul | Area fitur yang diuji |
| Kategori | POSITIF atau NEGATIF |
| Deskripsi | Deskripsi detail skenario uji |
| Langkah | Langkah-langkah pengujian |
| Hasil yang Diharapkan | Hasil yang diharapkan |
| Status | Belum Dimulai / Sedang Berjalan / Selesai |

---

## KASUS UJI MANAJEMEN KATEGORI

### Kasus Uji Positif

| ID Uji | Nama Uji | Kategori | Deskripsi | Langkah | Hasil yang Diharapkan | Status |
|---------|-----------|----------|-------------|-------|-----------------|--------|
| TC_CAT_001 | Buat Kategori - Data Valid | POSITIF | Membuat kategori baru dengan nama dan ikon yang valid | 1. Navigasi ke menu Kategori<br>2. Klik tombol "Buat Baru"<br>3. Masukkan nama: "Sepatu"<br>4. Unggah file ikon<br>5. Klik "Simpan" | Kategori berhasil dibuat, slug otomatis dibuat sebagai "sepatu", ditampilkan dalam daftar | Belum Dimulai |
| TC_CAT_002 | Buat Kategori - Pembuatan Slug Otomatis | POSITIF | Verifikasi slug dibuat otomatis dari nama | 1. Navigasi ke Kategori<br>2. Buat kategori dengan nama: "Nike Running Shoes"<br>3. Kirim formulir | Field slug terisi sebagai "nike-running-shoes" tanpa input manual | Belum Dimulai |
| TC_CAT_003 | Lihat Daftar Kategori | POSITIF | Menampilkan semua kategori aktif | 1. Navigasi ke menu Kategori | Daftar semua kategori ditampilkan dengan nama, slug, ikon | Belum Dimulai |
| TC_CAT_004 | Edit Kategori - Data Valid | POSITIF | Mengedit detail kategori yang ada | 1. Navigasi ke Kategori<br>2. Klik edit pada kategori "Sepatu"<br>3. Ubah nama menjadi "Sepatu Olahraga"<br>4. Klik "Perbarui" | Kategori diperbarui, slug otomatis dibuat ulang menjadi "sepatu-olahraga" | Belum Dimulai |
| TC_CAT_005 | Hapus Kategori - Soft Delete | POSITIF | Soft delete kategori | 1. Navigasi ke Kategori<br>2. Klik hapus pada "Sepatu Olahraga"<br>3. Konfirmasi penghapusan | Kategori dihapus dari daftar aktif, dapat dipulihkan dari sampah | Belum Dimulai |
| TC_CAT_006 | Pulihkan Kategori yang Dihapus | POSITIF | Memulihkan kategori yang di-soft delete | 1. Navigasi ke sampah Kategori<br>2. Klik pulihkan pada kategori yang dihapus<br>3. Konfirmasi | Kategori dipulihkan ke daftar aktif | Belum Dimulai |
| TC_CAT_007 | Hapus Kategori Permanen | POSITIF | Menghapus kategori secara permanen dari sampah | 1. Navigasi ke sampah Kategori<br>2. Klik hapus permanen<br>3. Konfirmasi | Kategori dihapus permanen dari database | Belum Dimulai |
| TC_CAT_008 | Kategori dengan Banyak Produk | POSITIF | Kategori dapat memiliki beberapa produk | 1. Buat kategori "Fashion"<br>2. Buat 5+ produk yang terhubung ke kategori ini<br>3. Lihat kategori | Semua produk terhubung ditampilkan, jumlah akurat | Belum Dimulai |
| TC_CAT_009 | Cari Kategori | POSITIF | Mencari kategori berdasarkan nama | 1. Navigasi ke Kategori<br>2. Masukkan "Sepatu" di pencarian<br>3. Tekan cari | Hanya kategori yang cocok dengan "Sepatu" yang ditampilkan | Belum Dimulai |
| TC_CAT_010 | Filter Kategori berdasarkan Status | POSITIF | Memfilter kategori aktif/terhapus | 1. Navigasi ke Kategori<br>2. Gunakan dropdown filter<br>3. Pilih "Aktif" atau "Terhapus" | Kategori yang benar ditampilkan berdasarkan filter | Belum Dimulai |

### Kasus Uji Negatif

| ID Uji | Nama Uji | Kategori | Deskripsi | Langkah | Hasil yang Diharapkan | Status |
|---------|-----------|----------|-------------|-------|-----------------|--------|
| TC_CAT_NEG_001 | Buat Kategori - Nama Kosong | NEGATIF | Mencoba membuat kategori tanpa nama | 1. Navigasi ke Kategori<br>2. Klik "Buat Baru"<br>3. Biarkan nama kosong<br>4. Klik "Simpan" | Error validasi form: "Nama wajib diisi" | Belum Dimulai |
| TC_CAT_NEG_002 | Buat Kategori - Nama Duplikat | NEGATIF | Mencoba membuat kategori dengan nama yang sudah ada | 1. Buat kategori "Sepatu"<br>2. Coba buat "Sepatu" lagi | Pesan error: "Nama kategori sudah ada" atau sistem mencegah duplikat | Belum Dimulai |
| TC_CAT_NEG_003 | Buat Kategori - Ikon Tidak Ada | NEGATIF | Mencoba membuat kategori tanpa ikon | 1. Navigasi ke Kategori<br>2. Masukkan nama saja<br>3. Lewati unggah ikon<br>4. Klik "Simpan" | Error validasi form atau field ikon ditandai wajib diisi | Belum Dimulai |
| TC_CAT_NEG_004 | Buat Kategori - Format Ikon Tidak Valid | NEGATIF | Unggah file non-gambar sebagai ikon | 1. Navigasi ke Kategori<br>2. Masukkan nama: "Test"<br>3. Unggah file .txt sebagai ikon<br>4. Klik "Simpan" | Error validasi file: "Hanya file gambar yang diizinkan" | Belum Dimulai |
| TC_CAT_NEG_005 | Buat Kategori - File Ikon Terlalu Besar | NEGATIF | Unggah gambar ikon berukuran berlebihan | 1. Buat form kategori<br>2. Unggah gambar > 5MB<br>3. Klik "Simpan" | Error ukuran file: "Gambar harus kurang dari 5MB" | Belum Dimulai |
| TC_CAT_NEG_006 | Buat Kategori - Karakter Khusus dalam Nama | NEGATIF | Membuat kategori dengan karakter khusus tidak valid | 1. Navigasi ke Kategori<br>2. Masukkan nama: "Sepatu@#$%"<br>3. Klik "Simpan" | Disanitasi atau ditampilkan error validasi | Belum Dimulai |
| TC_CAT_NEG_007 | Buat Kategori - Percobaan SQL Injection | NEGATIF | Mencoba SQL injection di nama kategori | 1. Masukkan nama: "'; DROP TABLE categories; --"<br>2. Klik "Simpan" | Input disanitasi, tidak ada kerusakan database | Belum Dimulai |
| TC_CAT_NEG_008 | Edit Kategori - Nama Kosong | NEGATIF | Mengosongkan nama kategori saat edit | 1. Edit kategori yang ada<br>2. Kosongkan field nama<br>3. Klik "Perbarui" | Error validasi: "Nama wajib diisi" | Belum Dimulai |
| TC_CAT_NEG_009 | Hapus Kategori dengan Produk | NEGATIF | Menghapus kategori yang memiliki produk terkait | 1. Buat kategori dengan produk<br>2. Coba hapus kategori | Dicegah dengan error atau produk dipindahkan | Belum Dimulai |
| TC_CAT_NEG_010 | Pembuatan Kategori Tanpa Otorisasi | NEGATIF | User non-admin mencoba membuat kategori | 1. Login sebagai non-admin<br>2. Coba akses Kategori<br>3. Coba buat kategori | Akses ditolak, dialihkan ke dashboard | Belum Dimulai |

---

## KASUS UJI MANAJEMEN BRAND

### Kasus Uji Positif

| ID Uji | Nama Uji | Kategori | Deskripsi | Langkah | Hasil yang Diharapkan | Status |
|---------|-----------|----------|-------------|-------|-----------------|--------|
| TC_BRN_001 | Buat Brand - Data Valid | POSITIF | Membuat brand dengan nama dan logo yang valid | 1. Navigasi ke Brand<br>2. Klik "Buat Baru"<br>3. Masukkan nama: "Nike"<br>4. Unggah logo<br>5. Klik "Simpan" | Brand berhasil dibuat, slug otomatis dibuat sebagai "nike" | Belum Dimulai |
| TC_BRN_002 | Buat Brand - Pembuatan Slug Otomatis | POSITIF | Verifikasi slug dibuat otomatis | 1. Buat brand dengan nama: "Adidas Originals"<br>2. Kirim formulir | Slug otomatis dibuat sebagai "adidas-originals" | Belum Dimulai |
| TC_BRN_003 | Lihat Daftar Brand | POSITIF | Menampilkan semua brand aktif | 1. Navigasi ke Brand | Daftar brand dengan nama, slug, logo ditampilkan | Belum Dimulai |
| TC_BRN_004 | Edit Brand - Data Valid | POSITIF | Mengedit detail brand | 1. Navigasi ke Brand<br>2. Klik edit pada "Nike"<br>3. Ubah nama menjadi "Nike Inc"<br>4. Klik "Perbarui" | Brand diperbarui, slug dibuat ulang menjadi "nike-inc" | Belum Dimulai |
| TC_BRN_005 | Hapus Brand - Soft Delete | POSITIF | Soft delete brand | 1. Navigasi ke Brand<br>2. Klik hapus pada brand<br>3. Konfirmasi | Brand dihapus dari daftar aktif | Belum Dimulai |
| TC_BRN_006 | Pulihkan Brand yang Dihapus | POSITIF | Memulihkan brand yang di-soft delete | 1. Navigasi ke sampah Brand<br>2. Klik pulihkan<br>3. Konfirmasi | Brand dipulihkan ke daftar aktif | Belum Dimulai |
| TC_BRN_007 | Brand dengan Banyak Produk | POSITIF | Brand dapat memiliki beberapa produk | 1. Buat brand<br>2. Buat 5+ produk yang terhubung ke brand<br>3. Lihat brand | Semua produk ditampilkan dengan benar | Belum Dimulai |
| TC_BRN_008 | Cari Brand | POSITIF | Mencari brand berdasarkan nama | 1. Navigasi ke Brand<br>2. Masukkan kata kunci pencarian<br>3. Tekan cari | Brand yang cocok ditampilkan | Belum Dimulai |
| TC_BRN_009 | Urutkan Brand | POSITIF | Mengurutkan brand berdasarkan nama/tanggal | 1. Navigasi ke Brand<br>2. Klik header pengurutan<br>3. Verifikasi urutan | Brand diurutkan dengan benar | Belum Dimulai |
| TC_BRN_010 | Tampilan Logo Brand | POSITIF | Logo ditampilkan dengan benar pada halaman brand | 1. Buat brand dengan logo<br>2. Lihat detail brand | Gambar logo ditampilkan dengan benar | Belum Dimulai |

### Kasus Uji Negatif

| ID Uji | Nama Uji | Kategori | Deskripsi | Langkah | Hasil yang Diharapkan | Status |
|---------|-----------|----------|-------------|-------|-----------------|--------|
| TC_BRN_NEG_001 | Create Brand - Empty Name | NEGATIVE | Create without name | 1. Navigate to Brands<br>2. Leave name empty<br>3. Click "Save" | Validation error: "Name is required" | Not Started |
| TC_BRN_NEG_002 | Create Brand - Duplicate Name | NEGATIVE | Create brand with existing name | 1. Create "Nike"<br>2. Try to create another "Nike" | Duplicate error | Not Started |
| TC_BRN_NEG_003 | Create Brand - Missing Logo | NEGATIVE | Create without logo upload | 1. Enter name only<br>2. Skip logo<br>3. Click "Save" | Validation error or logo required | Not Started |
| TC_BRN_NEG_004 | Create Brand - Invalid Logo Format | NEGATIVE | Upload non-image file | 1. Enter name<br>2. Upload .pdf<br>3. Click "Save" | File validation error | Not Started |
| TC_BRN_NEG_005 | Create Brand - Logo Too Large | NEGATIVE | Upload oversized logo | 1. Upload image > 5MB | File size error | Not Started |
| TC_BRN_NEG_006 | Create Brand - XSS Attempt | NEGATIVE | Attempt XSS in name field | 1. Enter name: "<script>alert('xss')</script>"<br>2. Click "Save" | Input sanitized, no script execution | Not Started |
| TC_BRN_NEG_007 | Edit Brand - Empty Name | NEGATIVE | Clear name during edit | 1. Edit brand<br>2. Clear name<br>3. Click "Update" | Validation error | Not Started |
| TC_BRN_NEG_008 | Delete Brand with Products | NEGATIVE | Delete brand linked to products | 1. Brand has products<br>2. Try to delete | Prevented or handled gracefully | Not Started |
| TC_BRN_NEG_009 | Unauthorized Brand Access | NEGATIVE | Non-admin attempts brand management | 1. Login as non-admin<br>2. Try to access Brands | Access denied | Not Started |
| TC_BRN_NEG_010 | Very Long Brand Name | NEGATIVE | Enter excessively long name | 1. Enter 500+ character name<br>2. Click "Save" | Either truncated or validation error | Not Started |

---

## KASUS UJI MANAJEMEN PRODUK

### Kasus Uji Positif

| ID Uji | Nama Uji | Kategori | Deskripsi | Langkah | Hasil yang Diharapkan | Status |
|---------|-----------|----------|-------------|-------|-----------------|--------|
| TC_PRD_001 | Create Product - Complete Data | POSITIVE | Create product with all required fields | 1. Navigate to Products<br>2. Click "Create New"<br>3. Fill: name, price, stock, category, brand<br>4. Upload thumbnail<br>5. Add description<br>6. Click "Save" | Product created with auto-slug, displayed in list | Not Started |
| TC_PRD_002 | Create Product - Auto Slug Generation | POSITIVE | Verify slug generation from name | 1. Create product: "Nike Air Max 90"<br>2. Submit | Slug auto-generated: "nike-air-max-90" | Not Started |
| TC_PRD_003 | Create Product - Prices with Decimals | POSITIVE | Handle decimal prices | 1. Create product<br>2. Enter price: "150.99"<br>3. Save | Price stored/displayed correctly as 150.99 | Not Started |
| TC_PRD_004 | Create Product - Zero Stock | POSITIVE | Create product with 0 stock | 1. Create product<br>2. Enter stock: "0"<br>3. Save | Product created, stock shows as 0 | Not Started |
| TC_PRD_005 | Create Product - Large Stock | POSITIVE | Handle large stock numbers | 1. Enter stock: "999999"<br>2. Save | Stock stored correctly | Not Started |
| TC_PRD_006 | Mark Product as Popular | POSITIVE | Toggle is_popular flag | 1. Create product<br>2. Check "Mark as Popular"<br>3. Save | Product marked, appears in popular section | Not Started |
| TC_PRD_007 | Unmark Product as Popular | POSITIVE | Remove popular status | 1. Edit popular product<br>2. Uncheck "Mark as Popular"<br>3. Save | Popular status removed | Not Started |
| TC_PRD_008 | View Product List | POSITIVE | Display all products | 1. Navigate to Products | All products listed with name, price, stock, category, brand | Not Started |
| TC_PRD_009 | Edit Product - Valid Changes | POSITIVE | Update product details | 1. Edit product<br>2. Change name, price, stock<br>3. Click "Update" | Changes saved and reflected in list | Not Started |
| TC_PRD_010 | Edit Product - Update Thumbnail | POSITIVE | Replace product thumbnail | 1. Edit product<br>2. Upload new thumbnail<br>3. Save | New thumbnail saved, old one replaced | Not Started |
| TC_PRD_011 | Hapus Produk - Soft Delete | POSITIF | Soft delete produk | 1. Navigasi ke Produk<br>2. Klik hapus<br>3. Konfirmasi | Produk dihapus dari daftar aktif, tersedia di sampah | Belum Dimulai |
| TC_PRD_012 | Pulihkan Produk yang Dihapus | POSITIF | Memulihkan produk yang di-soft delete | 1. Navigasi ke sampah Produk<br>2. Klik pulihkan<br>3. Konfirmasi | Produk dipulihkan ke daftar aktif | Belum Dimulai |
| TC_PRD_013 | Hapus Produk Permanen | POSITIF | Penghapusan permanen dari sampah | 1. Navigasi ke sampah<br>2. Klik hapus permanen<br>3. Konfirmasi | Produk dihapus dari database | Belum Dimulai |
| TC_PRD_014 | Cari Produk | POSITIF | Mencari berdasarkan nama | 1. Navigasi ke Produk<br>2. Masukkan pencarian: "Nike"<br>3. Tekan cari | Produk dengan "Nike" ditampilkan | Belum Dimulai |
| TC_PRD_015 | Filter Produk berdasarkan Kategori | POSITIF | Memfilter produk berdasarkan kategori | 1. Navigasi ke Produk<br>2. Pilih filter kategori<br>3. Pilih "Sepatu" | Hanya produk dalam kategori Sepatu yang ditampilkan | Belum Dimulai |
| TC_PRD_016 | Filter Produk berdasarkan Brand | POSITIF | Memfilter berdasarkan brand | 1. Pilih filter brand<br>2. Pilih "Nike" | Hanya produk Nike yang ditampilkan | Belum Dimulai |
| TC_PRD_017 | Urutkan Produk berdasarkan Harga | POSITIF | Mengurutkan ascending/descending | 1. Klik kolom harga<br>2. Verifikasi urutan | Produk diurutkan berdasarkan harga dengan benar | Belum Dimulai |
| TC_PRD_018 | Urutkan Produk berdasarkan Stok | POSITIF | Mengurutkan berdasarkan jumlah stok | 1. Klik kolom stok | Produk diurutkan berdasarkan stok | Belum Dimulai |
| TC_PRD_019 | Paginasi | POSITIF | Navigasi melalui halaman produk | 1. Navigasi ke Produk<br>2. Klik halaman berikutnya | Halaman berikutnya produk ditampilkan | Belum Dimulai |
| TC_PRD_020 | Produk dengan Relasi Kategori | POSITIF | Verifikasi asosiasi kategori | 1. Buat produk dalam kategori "Sepatu"<br>2. Lihat produk | Kategori ditampilkan dengan benar | Belum Dimulai |
| TC_PRD_021 | Produk dengan Relasi Brand | POSITIF | Verifikasi asosiasi brand | 1. Buat produk brand "Nike"<br>2. Lihat produk | Brand ditampilkan dengan benar | Belum Dimulai |

### Negative Test Cases

| Test ID | Test Name | Category | Description | Steps | Expected Result | Status |
|---------|-----------|----------|-------------|-------|-----------------|--------|
| TC_PRD_NEG_001 | Create Product - Empty Name | NEGATIVE | Submit without product name | 1. Leave name empty<br>2. Fill other fields<br>3. Click "Save" | Validation error: "Name is required" | Not Started |
| TC_PRD_NEG_002 | Create Product - Negative Price | NEGATIVE | Enter negative price | 1. Enter price: "-100"<br>2. Click "Save" | Validation error or price corrected to 0 | Not Started |
| TC_PRD_NEG_003 | Create Product - Invalid Price Format | NEGATIVE | Enter non-numeric price | 1. Enter price: "abc"<br>2. Click "Save" | Validation error: "Price must be numeric" | Not Started |
| TC_PRD_NEG_004 | Create Product - Negative Stock | NEGATIVE | Enter negative stock | 1. Enter stock: "-10"<br>2. Click "Save" | Validation error or corrected to 0 | Not Started |
| TC_PRD_NEG_005 | Create Product - Non-numeric Stock | NEGATIVE | Enter text in stock field | 1. Enter stock: "abc"<br>2. Click "Save" | Validation error | Not Started |
| TC_PRD_NEG_006 | Create Product - No Category | NEGATIVE | Create without selecting category | 1. Fill product info<br>2. Leave category empty<br>3. Click "Save" | Validation error: "Category is required" | Not Started |
| TC_PRD_NEG_007 | Create Product - No Brand | NEGATIVE | Create without selecting brand | 1. Fill product info<br>2. Leave brand empty<br>3. Click "Save" | Validation error: "Brand is required" | Not Started |
| TC_PRD_NEG_008 | Create Product - Missing Thumbnail | NEGATIVE | Create without uploading thumbnail | 1. Fill all fields<br>2. Skip thumbnail<br>3. Click "Save" | Validation error or thumbnail required | Not Started |
| TC_PRD_NEG_009 | Create Product - Invalid Thumbnail Format | NEGATIVE | Upload non-image file | 1. Upload .txt as thumbnail<br>2. Click "Save" | File validation error | Not Started |
| TC_PRD_NEG_010 | Buat Produk - Thumbnail Terlalu Besar | NEGATIF | Unggah gambar > 10MB | 1. Unggah gambar berukuran berlebihan<br>2. Klik "Simpan" | Error ukuran file | Belum Dimulai |
| TC_PRD_NEG_011 | Buat Produk - Harga Terlalu Besar | NEGATIF | Masukkan harga yang sangat besar | 1. Masukkan harga: "99999999999999"<br>2. Klik "Simpan" | Diterima atau error overflow | Belum Dimulai |
| TC_PRD_NEG_012 | Buat Produk - Stok Terlalu Besar | NEGATIF | Masukkan stok yang sangat besar | 1. Masukkan stok: "99999999999"<br>2. Klik "Simpan" | Diterima atau error overflow | Belum Dimulai |
| TC_PRD_NEG_013 | Buat Produk - XSS di Deskripsi | NEGATIF | Mencoba XSS di field about | 1. Masukkan: "<img src=x onerror=alert('xss')>"<br>2. Klik "Simpan" | Input disanitasi, tidak ada eksekusi script | Belum Dimulai |
| TC_PRD_NEG_014 | Buat Produk - SQL Injection | NEGATIF | SQL injection di nama | 1. Nama: "'; DROP TABLE produks; --"<br>2. Klik "Simpan" | Input disanitasi, tidak ada kerusakan | Belum Dimulai |
| TC_PRD_NEG_015 | Edit Produk - Nama Kosong | NEGATIF | Mengosongkan nama saat edit | 1. Edit produk<br>2. Kosongkan nama<br>3. Klik "Perbarui" | Error validasi | Belum Dimulai |
| TC_PRD_NEG_016 | Edit Produk - Kategori Null | NEGATIF | Menghapus kategori dari produk | 1. Edit produk<br>2. Kosongkan kategori<br>3. Klik "Perbarui" | Error validasi atau dicegah | Belum Dimulai |
| TC_PRD_NEG_017 | Edit Produk - Brand Null | NEGATIF | Menghapus brand dari produk | 1. Edit produk<br>2. Kosongkan brand<br>3. Klik "Perbarui" | Error validasi atau dicegah | Belum Dimulai |
| TC_PRD_NEG_018 | Buat Produk - Nama Duplikat Kategori Sama | NEGATIF | Membuat duplikat di kategori yang sama | 1. Buat produk "Nike Air Max"<br>2. Buat lagi "Nike Air Max" di kategori sama | Diizinkan atau peringatan duplikat | Belum Dimulai |
| TC_PRD_NEG_019 | Pembuatan Produk Tanpa Otorisasi | NEGATIF | Non-admin membuat produk | 1. Login sebagai non-admin<br>2. Coba buat produk | Akses ditolak | Belum Dimulai |
| TC_PRD_NEG_020 | Buat Produk - Deskripsi Kosong | NEGATIF | Membuat tanpa deskripsi | 1. Isi field yang dibutuhkan<br>2. Biarkan about/deskripsi kosong<br>3. Klik "Simpan" | Diizinkan (opsional) atau error wajib diisi | Belum Dimulai |

---

## KASUS UJI MANAJEMEN KODE PROMO

### Kasus Uji Positif

| ID Uji | Nama Uji | Kategori | Deskripsi | Langkah | Hasil yang Diharapkan | Status |
|---------|-----------|----------|-------------|-------|-----------------|--------|
| TC_PROMO_001 | Create Promo Code - Valid Data | POSITIVE | Create valid promo with code and discount | 1. Navigate to Promo Codes<br>2. Click "Create New"<br>3. Enter code: "SAVE100"<br>4. Enter discount: "100000"<br>5. Click "Save" | Promo code created successfully | Not Started |
| TC_PROMO_002 | Create Promo Code - Valid Discount Amount | POSITIVE | Create with various discount amounts | 1. Create promo code<br>2. Enter discount: "50000"<br>3. Save | Code created with exact discount amount | Not Started |
| TC_PROMO_003 | Create Promo Code - Large Discount | POSITIVE | Create with large discount value | 1. Enter discount: "5000000"<br>2. Save | Code created with large discount stored correctly | Not Started |
| TC_PROMO_004 | Create Promo Code - Zero Discount | POSITIVE | Create with zero discount | 1. Enter discount: "0"<br>2. Save | Code created (edge case) | Not Started |
| TC_PROMO_005 | View Promo Code List | POSITIVE | Display all active promo codes | 1. Navigate to Promo Codes | List of codes with code, discount amount displayed | Not Started |
| TC_PROMO_006 | Edit Promo Code | POSITIVE | Update existing promo code | 1. Navigate to Promo Codes<br>2. Click edit on code<br>3. Change discount to "200000"<br>4. Click "Update" | Promo code updated with new discount | Not Started |
| TC_PROMO_007 | Delete Promo Code - Soft Delete | POSITIVE | Soft delete promo code | 1. Navigate to Promo Codes<br>2. Click delete<br>3. Confirm | Code removed from active list | Not Started |
| TC_PROMO_008 | Restore Deleted Promo Code | POSITIVE | Restore soft-deleted code | 1. Navigate to Promo Codes trash<br>2. Click restore<br>3. Confirm | Code restored to active list | Not Started |
| TC_PROMO_009 | Search Promo Codes | POSITIVE | Search by code name | 1. Navigate to Promo Codes<br>2. Enter search: "SAVE"<br>3. Press search | Matching codes displayed | Not Started |
| TC_PROMO_010 | Terapkan Promo ke Transaksi | POSITIF | Menggunakan kode promo di transaksi | 1. Buat transaksi<br>2. Terapkan kode promo "SAVE100"<br>3. Verifikasi diskon diterapkan | Jumlah diskon dikurangi dari total | Belum Dimulai |

### Kasus Uji Negatif

| ID Uji | Nama Uji | Kategori | Deskripsi | Langkah | Hasil yang Diharapkan | Status |
|---------|-----------|----------|-------------|-------|-----------------|--------|
| TC_PROMO_NEG_001 | Create Promo Code - Empty Code | NEGATIVE | Create without code | 1. Leave code field empty<br>2. Enter discount<br>3. Click "Save" | Validation error: "Code is required" | Not Started |
| TC_PROMO_NEG_002 | Create Promo Code - Duplicate Code | NEGATIVE | Create code that already exists | 1. Create "SAVE100"<br>2. Try to create another "SAVE100" | Duplicate error | Not Started |
| TC_PROMO_NEG_003 | Create Promo Code - Negative Discount | NEGATIVE | Enter negative discount amount | 1. Enter discount: "-50000"<br>2. Click "Save" | Validation error or corrected to 0 | Not Started |
| TC_PROMO_NEG_004 | Create Promo Code - Non-numeric Discount | NEGATIVE | Enter text in discount | 1. Enter discount: "abc"<br>2. Click "Save" | Validation error | Not Started |
| TC_PROMO_NEG_005 | Create Promo Code - Missing Discount | NEGATIVE | Create without discount amount | 1. Enter code<br>2. Leave discount empty<br>3. Click "Save" | Validation error: "Discount amount is required" | Not Started |
| TC_PROMO_NEG_006 | Create Promo Code - Empty Code and Discount | NEGATIVE | Create with all empty fields | 1. Leave both fields empty<br>2. Click "Save" | Multiple validation errors | Not Started |
| TC_PROMO_NEG_007 | Create Promo Code - Very Long Code | NEGATIVE | Enter excessively long code | 1. Enter 500+ character code<br>2. Click "Save" | Either truncated or validation error | Not Started |
| TC_PROMO_NEG_008 | Create Promo Code - Special Characters | NEGATIVE | Code with invalid special characters | 1. Enter code: "SAVE@#$%"<br>2. Click "Save" | Either sanitized or validation error | Not Started |
| TC_PROMO_NEG_009 | Create Promo Code - Whitespace Only | NEGATIVE | Code with only spaces | 1. Enter code: "     "<br>2. Click "Save" | Validation error | Not Started |
| TC_PROMO_NEG_010 | Edit Promo Code - Empty Code | NEGATIVE | Clear code during edit | 1. Edit promo<br>2. Clear code<br>3. Click "Update" | Validation error | Not Started |
| TC_PROMO_NEG_011 | Unauthorized Promo Access | NEGATIVE | Non-admin manages promos | 1. Login as non-admin<br>2. Try to access Promo Codes | Access denied | Not Started |
| TC_PROMO_NEG_012 | Create Promo Code - Discount Exceeds Price | NEGATIVE | Apply promo with discount > product price | 1. Create transaction<br>2. Apply promo with large discount<br>3. Check total | Either prevented, capped at 0, or allowed (business decision) | Not Started |

---

## KASUS UJI TRANSAKSI PRODUK

### Kasus Uji Positif

| ID Uji | Nama Uji | Kategori | Deskripsi | Langkah | Hasil yang Diharapkan | Status |
|---------|-----------|----------|-------------|-------|-----------------|--------|
| TC_TRX_001 | Buat Transaksi - Data Lengkap | POSITIF | Membuat transaksi dengan semua field yang dibutuhkan | 1. Navigasi ke Transaksi<br>2. Klik "Buat Baru"<br>3. Isi: nama, telepon, email, alamat, kota, kode pos<br>4. Pilih produk, jumlah, ukuran<br>5. Klik "Simpan" | Transaksi dibuat dengan booking_trx_id unik (format TJH) | Belum Dimulai |
| TC_TRX_002 | Pembuatan ID Transaksi Otomatis | POSITIF | Verifikasi pembuatan ID TJH-prefixed yang unik | 1. Buat transaksi<br>2. Cek field booking_trx_id | ID dalam format TJH diikuti 5 digit (contoh: TJH12345) | Belum Dimulai |
| TC_TRX_003 | Transaksi dengan Kode Promo | POSITIF | Menerapkan kode promo ke transaksi | 1. Buat transaksi<br>2. Pilih kode promo "SAVE100"<br>3. Isi field lain<br>4. Simpan | Diskon diterapkan, grand_total_amount dikurangi | Belum Dimulai |
| TC_TRX_004 | Hitung Sub Total | POSITIF | Verifikasi perhitungan harga × jumlah | 1. Harga produk: 100000<br>2. Jumlah: 2<br>3. Simpan transaksi | sub_total_amount = 200000 | Belum Dimulai |
| TC_TRX_005 | Hitung Grand Total dengan Diskon | POSITIF | Verifikasi: grand_total = sub_total - discount | 1. Sub total: 200000<br>2. Diskon: 50000<br>3. Simpan | grand_total = 150000 | Belum Dimulai |
| TC_TRX_006 | Transaksi Tanpa Kode Promo | POSITIF | Membuat transaksi tanpa promo (nullable) | 1. Buat transaksi<br>2. Biarkan kode promo kosong<br>3. Simpan | Transaksi dibuat, discount_amount = 0, promo_code_id = null | Belum Dimulai |
| TC_TRX_007 | Tandai Transaksi sebagai Dibayar | POSITIF | Set flag is_paid ke true | 1. Buat transaksi<br>2. Centang "Tandai sebagai Dibayar"<br>3. Unggah bukti<br>4. Simpan | Transaksi ditandai dibayar, bukti disimpan | Belum Dimulai |
| TC_TRX_008 | Tandai Transaksi sebagai Belum Dibayar | POSITIF | Transaksi dibuat dengan is_paid = false | 1. Buat transaksi<br>2. Biarkan "Dibayar" tidak dicentang<br>3. Simpan | Transaksi dibuat dengan is_paid = false | Belum Dimulai |
| TC_TRX_009 | Unggah Bukti Transaksi | POSITIF | Unggah gambar bukti pembayaran | 1. Buat transaksi<br>2. Tandai sebagai dibayar<br>3. Unggah gambar bukti<br>4. Simpan | Gambar bukti disimpan dan dapat diakses | Belum Dimulai |
| TC_TRX_010 | Lihat Daftar Transaksi | POSITIF | Menampilkan semua transaksi | 1. Navigasi ke Transaksi | Semua transaksi ditampilkan dengan booking_trx_id, nama pelanggan, total | Belum Dimulai |
| TC_TRX_011 | Edit Transaksi | POSITIF | Mengubah detail transaksi | 1. Edit transaksi yang ada<br>2. Ubah jumlah<br>3. Perbarui total<br>4. Klik "Perbarui" | Perubahan disimpan, total dihitung ulang | Belum Dimulai |
| TC_TRX_012 | Edit Status Pembayaran | POSITIF | Mengubah status is_paid | 1. Edit transaksi belum dibayar<br>2. Centang "Tandai sebagai Dibayar"<br>3. Perbarui | Status pembayaran diubah | Belum Dimulai |
| TC_TRX_013 | Hapus Transaksi - Soft Delete | POSITIF | Soft delete transaksi | 1. Navigasi ke Transaksi<br>2. Klik hapus<br>3. Konfirmasi | Transaksi dihapus dari daftar aktif | Belum Dimulai |
| TC_TRX_014 | Pulihkan Transaksi yang Dihapus | POSITIF | Memulihkan transaksi yang di-soft delete | 1. Navigasi ke sampah Transaksi<br>2. Klik pulihkan<br>3. Konfirmasi | Transaksi dipulihkan | Belum Dimulai |
| TC_TRX_015 | Cari Transaksi berdasarkan ID | POSITIF | Mencari berdasarkan booking_trx_id | 1. Navigasi ke Transaksi<br>2. Cari: "TJH12345" | Transaksi dengan ID yang cocok ditampilkan | Belum Dimulai |
| TC_TRX_016 | Cari Transaksi berdasarkan Nama Pelanggan | POSITIF | Mencari berdasarkan nama pelanggan | 1. Cari: "John Doe" | Transaksi dengan nama yang cocok ditampilkan | Belum Dimulai |
| TC_TRX_017 | Cari Transaksi berdasarkan Email | POSITIF | Mencari berdasarkan email pelanggan | 1. Cari: "john@example.com" | Transaksi dengan email yang cocok ditampilkan | Belum Dimulai |
| TC_TRX_018 | Filter Transaksi berdasarkan Status Pembayaran | POSITIF | Memfilter yang dibayar/belum dibayar | 1. Pilih filter "Dibayar" atau "Belum Dibayar" | Transaksi dengan status yang benar ditampilkan | Belum Dimulai |
| TC_TRX_019 | Filter Transaksi berdasarkan Produk | POSITIF | Memfilter berdasarkan produk tertentu | 1. Pilih filter produk<br>2. Pilih sebuah produk | Transaksi dengan produk yang dipilih ditampilkan | Belum Dimulai |
| TC_TRX_020 | Jumlah Banyak Mengurangi Stok | POSITIF | Verifikasi pengurangan stok saat pembelian | 1. Produk memiliki 10 stok<br>2. Buat transaksi dengan jumlah 3<br>3. Cek stok produk | Stok produk dikurangi menjadi 7 (jika otomatis dikurangi) | Belum Dimulai |
| TC_TRX_021 | Transaksi dengan Beberapa Ukuran | POSITIF | Menangani ukuran produk dalam transaksi | 1. Produk memiliki ukuran: S, M, L<br>2. Buat transaksi pilih ukuran "M"<br>3. Simpan | Ukuran disimpan dalam field produk_size | Belum Dimulai |
| TC_TRX_022 | Validasi Email | POSITIF | Format email yang valid diterima | 1. Masukkan email: "john@example.com"<br>2. Simpan | Email diterima dan disimpan | Belum Dimulai |
| TC_TRX_023 | Validasi Nomor Telepon | POSITIF | Format telepon yang valid diterima | 1. Masukkan telepon: "+6281234567890"<br>2. Simpan | Telepon diterima dan disimpan | Belum Dimulai |
| TC_TRX_024 | Relasi Transaksi dengan Produk | POSITIF | Verifikasi relasi produk | 1. Buat transaksi untuk produk "Nike Air"<br>2. Lihat transaksi | Nama produk dan detail ditampilkan | Belum Dimulai |

### Kasus Uji Negatif

| ID Uji | Nama Uji | Kategori | Deskripsi | Langkah | Hasil yang Diharapkan | Status |
|---------|-----------|----------|-------------|-------|-----------------|--------|
| TC_TRX_NEG_001 | Create Transaction - Empty Customer Name | NEGATIVE | Leave customer name empty | 1. Fill other fields<br>2. Leave name empty<br>3. Click "Save" | Validation error: "Name is required" | Not Started |
| TC_TRX_NEG_002 | Create Transaction - Empty Email | NEGATIVE | Create without email | 1. Fill required fields<br>2. Leave email empty<br>3. Click "Save" | Validation error: "Email is required" | Not Started |
| TC_TRX_NEG_003 | Create Transaction - Invalid Email Format | NEGATIVE | Enter invalid email | 1. Enter email: "not-an-email"<br>2. Click "Save" | Validation error: "Email must be valid" | Not Started |
| TC_TRX_NEG_004 | Create Transaction - Empty Phone | NEGATIVE | Leave phone empty | 1. Fill other fields<br>2. Leave phone empty<br>3. Click "Save" | Validation error: "Phone is required" | Not Started |
| TC_TRX_NEG_005 | Create Transaction - Invalid Phone Format | NEGATIVE | Enter invalid phone | 1. Enter phone: "abc123"<br>2. Click "Save" | Validation error: "Phone must be valid" | Not Started |
| TC_TRX_NEG_006 | Create Transaction - Empty Address | NEGATIVE | Leave address empty | 1. Fill other fields<br>2. Leave address empty<br>3. Click "Save" | Validation error: "Address is required" | Not Started |
| TC_TRX_NEG_007 | Create Transaction - Empty City | NEGATIVE | Leave city empty | 1. Fill other fields<br>2. Leave city empty<br>3. Click "Save" | Validation error: "City is required" | Not Started |
| TC_TRX_NEG_008 | Create Transaction - Empty Postcode | NEGATIVE | Leave postcode empty | 1. Fill other fields<br>2. Leave postcode empty<br>3. Click "Save" | Validation error: "Postcode is required" | Not Started |
| TC_TRX_NEG_009 | Create Transaction - No Product Selected | NEGATIVE | Create without selecting product | 1. Fill customer info<br>2. Leave product empty<br>3. Click "Save" | Validation error: "Product is required" | Not Started |
| TC_TRX_NEG_010 | Create Transaction - Zero Quantity | NEGATIVE | Enter quantity 0 | 1. Select product<br>2. Enter quantity: "0"<br>3. Click "Save" | Validation error: "Quantity must be > 0" | Not Started |
| TC_TRX_NEG_011 | Buat Transaksi - Jumlah Negatif | NEGATIF | Masukkan jumlah negatif | 1. Masukkan jumlah: "-5"<br>2. Klik "Simpan" | Error validasi | Belum Dimulai |
| TC_TRX_NEG_012 | Buat Transaksi - Jumlah Non-numerik | NEGATIF | Masukkan teks di jumlah | 1. Masukkan jumlah: "abc"<br>2. Klik "Simpan" | Error validasi | Belum Dimulai |
| TC_TRX_NEG_013 | Buat Transaksi - Jumlah > Stok | NEGATIF | Beli lebih dari stok tersedia | 1. Stok produk: 5<br>2. Masukkan jumlah: "10"<br>3. Klik "Simpan" | Error validasi: "Jumlah melebihi stok" atau dicegah | Belum Dimulai |
| TC_TRX_NEG_014 | Buat Transaksi - Kode Promo Tidak Valid | NEGATIF | Masukkan kode promo yang tidak ada | 1. Masukkan promo: "INVALID123"<br>2. Klik "Simpan" | Error: "Kode promo tidak ditemukan" atau dicegah | Belum Dimulai |
| TC_TRX_NEG_015 | Buat Transaksi - Ukuran Tidak Dipilih | NEGATIF | Membuat tanpa memilih ukuran produk | 1. Pilih produk dengan ukuran<br>2. Biarkan ukuran kosong<br>3. Klik "Simpan" | Error: "Ukuran wajib diisi" | Belum Dimulai |
| TC_TRX_NEG_016 | Buat Transaksi - Ukuran Tidak Valid | NEGATIF | Pilih ukuran yang tidak ada | 1. Pilih ukuran tidak ada di opsi produk<br>2. Klik "Simpan" | Error validasi atau dicegah | Belum Dimulai |
| TC_TRX_NEG_017 | Buat Transaksi - Format Kode Pos Tidak Valid | NEGATIF | Masukkan kode pos tidak valid | 1. Masukkan kode pos: "abc"<br>2. Klik "Simpan" | Diterima atau divalidasi untuk numerik | Belum Dimulai |
| TC_TRX_NEG_018 | Buat Transaksi - Bukti Tidak Ada Saat Dibayar | NEGATIF | Tandai dibayar tanpa unggah bukti | 1. Buat transaksi<br>2. Tandai sebagai "Dibayar"<br>3. Biarkan bukti kosong<br>4. Klik "Simpan" | Error validasi: "Bukti diperlukan saat dibayar" | Belum Dimulai |
| TC_TRX_NEG_019 | Buat Transaksi - File Bukti Tidak Valid | NEGATIF | Unggah non-gambar sebagai bukti | 1. Tandai sebagai dibayar<br>2. Unggah file .txt<br>3. Klik "Simpan" | Error validasi file | Belum Dimulai |
| TC_TRX_NEG_020 | Buat Transaksi - Bukti Terlalu Besar | NEGATIF | Unggah gambar bukti > 10MB | 1. Unggah bukti berukuran berlebihan<br>2. Klik "Simpan" | Error ukuran file | Belum Dimulai |
| TC_TRX_NEG_021 | Buat Transaksi - SQL Injection di Nama | NEGATIF | Mencoba SQL injection | 1. Nama: "'; DROP TABLE product_transactions; --"<br>2. Klik "Simpan" | Input disanitasi, tidak ada kerusakan | Belum Dimulai |
| TC_TRX_NEG_022 | Buat Transaksi - XSS di Alamat | NEGATIF | Mencoba XSS di alamat | 1. Alamat: "<script>alert('xss')</script>"<br>2. Klik "Simpan" | Input disanitasi, tidak ada eksekusi script | Belum Dimulai |
| TC_TRX_NEG_023 | Edit Transaksi - Jumlah > Sisa Stok | NEGATIF | Edit jumlah melebihi stok | 1. Edit transaksi<br>2. Ubah jumlah melebihi stok<br>3. Perbarui | Error validasi | Belum Dimulai |
| TC_TRX_NEG_024 | Akses Transaksi Tanpa Otorisasi | NEGATIF | Non-admin membuat transaksi | 1. Login sebagai non-admin<br>2. Coba buat transaksi | Akses ditolak atau akses terbatas | Belum Dimulai |

---

## KASUS UJI FOTO PRODUK

### Kasus Uji Positif

| ID Uji | Nama Uji | Kategori | Deskripsi | Langkah | Hasil yang Diharapkan | Status |
|---------|-----------|----------|-------------|-------|-----------------|--------|
| TC_PHOTO_001 | Add Product Photo | POSITIVE | Add photo to product | 1. Edit product<br>2. Click "Add Photo"<br>3. Upload image<br>4. Save | Photo added to product | Not Started |
| TC_PHOTO_002 | Add Multiple Photos | POSITIVE | Add multiple photos to one product | 1. Add photo 1<br>2. Add photo 2<br>3. Add photo 3 | All photos displayed in gallery | Not Started |
| TC_PHOTO_003 | Photo Display | POSITIVE | Photos display correctly | 1. Add photos to product<br>2. View product | All photos displayed in proper format | Not Started |
| TC_PHOTO_004 | Delete Product Photo | POSITIVE | Remove photo from product | 1. Edit product<br>2. Click delete on photo<br>3. Confirm | Photo removed from product | Not Started |
| TC_PHOTO_005 | View Photos in Gallery | POSITIVE | Display all product photos | 1. Navigate to product<br>2. View photo section | All photos displayed as gallery | Not Started |
| TC_PHOTO_006 | Product Without Photos | POSITIVE | Product can exist without photos | 1. Create product<br>2. Skip photo upload<br>3. Save | Product created, photos optional | Not Started |

### Negative Test Cases

| Test ID | Test Name | Category | Description | Steps | Expected Result | Status |
|---------|-----------|----------|-------------|-------|-----------------|--------|
| TC_PHOTO_NEG_001 | Upload Non-Image File | NEGATIVE | Try to upload .txt as photo | 1. Click "Add Photo"<br>2. Select .txt file<br>3. Submit | File validation error | Not Started |
| TC_PHOTO_NEG_002 | Upload Oversized Image | NEGATIVE | Upload image > 5MB | 1. Select large image<br>2. Upload | File size error | Not Started |
| TC_PHOTO_NEG_003 | Corrupt Image File | NEGATIVE | Upload corrupted image | 1. Upload corrupted .jpg<br>2. Submit | Error or image not processed | Not Started |
| TC_PHOTO_NEG_004 | Add Photo Without Product | NEGATIVE | Try to add photo without selecting product | 1. Navigate to photos<br>2. Try to add without product context | Error or prevented | Not Started |
| TC_PHOTO_NEG_005 | Delete All Product Photos | NEGATIVE | Remove all photos from product | 1. Product has 2 photos<br>2. Delete both | Photos removed, product still accessible | Not Started |

---

## KASUS UJI UKURAN PRODUK

### Kasus Uji Positif

| ID Uji | Nama Uji | Kategori | Deskripsi | Langkah | Hasil yang Diharapkan | Status |
|---------|-----------|----------|-------------|-------|-----------------|--------|
| TC_SIZE_001 | Add Product Size | POSITIVE | Add size to product | 1. Edit product<br>2. Click "Add Size"<br>3. Enter size: "M"<br>4. Save | Size added to product | Not Started |
| TC_SIZE_002 | Add Multiple Sizes | POSITIVE | Add multiple size options | 1. Add sizes: S, M, L, XL<br>2. Save | All sizes available for selection | Not Started |
| TC_SIZE_003 | View Product Sizes | POSITIVE | Display available sizes | 1. View product<br>2. Check sizes section | All sizes displayed in selection dropdown/list | Not Started |
| TC_SIZE_004 | Select Size in Transaction | POSITIVE | Choose size during purchase | 1. Create transaction<br>2. Select product with sizes<br>3. Choose size "M"<br>4. Save | Size recorded in transaction | Not Started |
| TC_SIZE_005 | Delete Product Size | POSITIVE | Remove size option | 1. Edit product<br>2. Click delete on size<br>3. Confirm | Size removed from options | Not Started |
| TC_SIZE_006 | Product Without Sizes | POSITIVE | Product can exist without sizes | 1. Create product<br>2. Skip sizes<br>3. Save | Product created, sizes optional | Not Started |
| TC_SIZE_007 | Numeric Sizes | POSITIVE | Store numeric size values | 1. Add sizes: 35, 36, 37, 38<br>2. Save | Numeric sizes stored correctly | Not Started |
| TC_SIZE_008 | Mixed Size Types | POSITIVE | Mixed alphanumeric sizes | 1. Add sizes: S, M, L, One Size<br>2. Save | All types stored correctly | Not Started |

### Negative Test Cases

| Test ID | Test Name | Category | Description | Steps | Expected Result | Status |
|---------|-----------|----------|-------------|-------|-----------------|--------|
| TC_SIZE_NEG_001 | Add Size - Empty Value | NEGATIVE | Add size with empty field | 1. Click "Add Size"<br>2. Leave field empty<br>3. Click "Save" | Validation error or not added | Not Started |
| TC_SIZE_NEG_002 | Add Duplicate Size | NEGATIVE | Add same size twice | 1. Add size "M"<br>2. Add size "M" again | Duplicate prevented or warning shown | Not Started |
| TC_SIZE_NEG_003 | Size Too Long | NEGATIVE | Enter excessively long size | 1. Enter 500+ character size<br>2. Save | Either truncated or validation error | Not Started |
| TC_SIZE_NEG_004 | Special Characters in Size | NEGATIVE | Size with invalid characters | 1. Enter size: "@#$%"<br>2. Save | Either sanitized or validation error | Not Started |
| TC_SIZE_NEG_005 | Transaction with Invalid Size | NEGATIVE | Select size not available | 1. Product sizes: S, M, L<br>2. Try to select "XL"<br>3. Submit | Error: "Size not available" | Not Started |

---

## RINGKASAN

### Jumlah Kasus Uji berdasarkan Modul

| Modul | Positif | Negatif | Total |
|--------|----------|----------|-------|
| Kategori | 10 | 10 | 20 |
| Brand | 10 | 10 | 20 |
| Produk | 21 | 20 | 41 |
| Kode Promo | 10 | 12 | 22 |
| Transaksi | 24 | 24 | 48 |
| Foto | 6 | 5 | 11 |
| Ukuran | 8 | 5 | 13 |
| **TOTAL** | **89** | **86** | **175** |

### Rekomendasi Pengujian Utama

1. **Validasi Data**: Semua field numerik (harga, stok, diskon) memerlukan pengujian batas
2. **Keamanan**: Semua input string perlu pengujian XSS dan SQL injection
3. **Logika Bisnis**: Verifikasi perhitungan (total, diskon, pengurangan stok)
4. **Unggah File**: Uji validasi jenis file, ukuran, dan konten
5. **Relasi**: Verifikasi foreign key constraints dan cascading behavior
6. **Soft Deletes**: Konfirmasi pemulihan data dari sampah
7. **Pembuatan Slug**: Verifikasi pembuatan slug URL-friendly dari nama
8. **Unique Constraints**: Uji deteksi duplikat (kode, nama)
9. **Otorisasi**: Uji kontrol akses berbasis peran
10. **Edge Cases**: Uji nilai batas, state kosong, dan input ekstrem

### Rekomendasi Urutan Eksekusi Uji

1. Mulai dengan Kategori dan Brand (entitas foundational)
2. Lanjutkan ke Produk (tergantung pada Kategori/Brand)
3. Uji Foto dan Ukuran Produk (fitur produk)
4. Uji Kode Promo (fitur independen)
5. Uji Transaksi (tergantung pada Produk dan Kode Promo)

---

**Akhir Dokumen Kasus Uji**
