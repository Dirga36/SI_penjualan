`# Kasus Uji Lengkap untuk SI Penjualan

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

### Negative Test Cases

| Test ID | Test Name | Category | Description | Steps | Expected Result | Status |
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

### Positive Test Cases

| Test ID | Test Name | Category | Description | Steps | Expected Result | Status |
|---------|-----------|----------|-------------|-------|-----------------|--------|
| TC_BRN_001 | Create Brand - Valid Data | POSITIVE | Create brand with valid name and logo | 1. Navigate to Brands<br>2. Click "Create New"<br>3. Enter name: "Nike"<br>4. Upload logo<br>5. Click "Save" | Brand created, slug auto-generated as "nike" | Not Started |
| TC_BRN_002 | Create Brand - Auto Slug Generation | POSITIVE | Verify slug auto-generation | 1. Create brand with name: "Adidas Originals"<br>2. Submit | Slug auto-generated as "adidas-originals" | Not Started |
| TC_BRN_003 | View Brand List | POSITIVE | Display all active brands | 1. Navigate to Brands | List of brands with name, slug, logo displayed | Not Started |
| TC_BRN_004 | Edit Brand - Valid Data | POSITIVE | Update brand details | 1. Navigate to Brands<br>2. Click edit on "Nike"<br>3. Change name to "Nike Inc"<br>4. Click "Update" | Brand updated, slug regenerated to "nike-inc" | Not Started |
| TC_BRN_005 | Delete Brand - Soft Delete | POSITIVE | Soft delete a brand | 1. Navigate to Brands<br>2. Click delete on brand<br>3. Confirm | Brand removed from active list | Not Started |
| TC_BRN_006 | Restore Deleted Brand | POSITIVE | Restore soft-deleted brand | 1. Navigate to Brands trash<br>2. Click restore<br>3. Confirm | Brand restored to active list | Not Started |
| TC_BRN_007 | Brand with Many Products | POSITIVE | Brand can have multiple products | 1. Create brand<br>2. Create 5+ products linked to brand<br>3. View brand | All products displayed correctly | Not Started |
| TC_BRN_008 | Search Brands | POSITIVE | Search brands by name | 1. Navigate to Brands<br>2. Enter search term<br>3. Press search | Matching brands displayed | Not Started |
| TC_BRN_009 | Sort Brands | POSITIVE | Sort brands by name/date | 1. Navigate to Brands<br>2. Click sort header<br>3. Verify order | Brands sorted in correct order | Not Started |
| TC_BRN_010 | Brand Logo Display | POSITIVE | Logo displays correctly on brand page | 1. Create brand with logo<br>2. View brand details | Logo image displayed correctly | Not Started |

### Negative Test Cases

| Test ID | Test Name | Category | Description | Steps | Expected Result | Status |
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

## PRODUCT MANAGEMENT TEST CASES

### Positive Test Cases

| Test ID | Test Name | Category | Description | Steps | Expected Result | Status |
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
| TC_PRD_011 | Delete Product - Soft Delete | POSITIVE | Soft delete product | 1. Navigate to Products<br>2. Click delete<br>3. Confirm | Product removed from active list, available in trash | Not Started |
| TC_PRD_012 | Restore Deleted Product | POSITIVE | Restore soft-deleted product | 1. Navigate to Products trash<br>2. Click restore<br>3. Confirm | Product restored to active list | Not Started |
| TC_PRD_013 | Permanently Delete Product | POSITIVE | Permanent deletion from trash | 1. Navigate trash<br>2. Click permanent delete<br>3. Confirm | Product removed from database | Not Started |
| TC_PRD_014 | Search Products | POSITIVE | Search by name | 1. Navigate to Products<br>2. Enter search: "Nike"<br>3. Press search | Products with "Nike" displayed | Not Started |
| TC_PRD_015 | Filter Products by Category | POSITIVE | Filter products by category | 1. Navigate to Products<br>2. Select category filter<br>3. Choose "Sepatu" | Only products in Sepatu category displayed | Not Started |
| TC_PRD_016 | Filter Products by Brand | POSITIVE | Filter by brand | 1. Select brand filter<br>2. Choose "Nike" | Only Nike products displayed | Not Started |
| TC_PRD_017 | Sort Products by Price | POSITIVE | Sort ascending/descending | 1. Click price column<br>2. Verify sort | Products sorted by price correctly | Not Started |
| TC_PRD_018 | Sort Products by Stock | POSITIVE | Sort by stock quantity | 1. Click stock column | Products sorted by stock | Not Started |
| TC_PRD_019 | Pagination | POSITIVE | Navigate through product pages | 1. Navigate to Products<br>2. Click next page | Next page of products displayed | Not Started |
| TC_PRD_020 | Product with Category Relationship | POSITIVE | Verify category association | 1. Create product in "Sepatu" category<br>2. View product | Category displayed correctly | Not Started |
| TC_PRD_021 | Product with Brand Relationship | POSITIVE | Verify brand association | 1. Create product "Nike" brand<br>2. View product | Brand displayed correctly | Not Started |

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
| TC_PRD_NEG_010 | Create Product - Thumbnail Too Large | NEGATIVE | Upload image > 10MB | 1. Upload oversized image<br>2. Click "Save" | File size error | Not Started |
| TC_PRD_NEG_011 | Create Product - Price Too Large | NEGATIVE | Enter extremely large price | 1. Enter price: "99999999999999"<br>2. Click "Save" | Either accepted or overflow error | Not Started |
| TC_PRD_NEG_012 | Create Product - Stock Too Large | NEGATIVE | Enter extremely large stock | 1. Enter stock: "99999999999"<br>2. Click "Save" | Either accepted or overflow error | Not Started |
| TC_PRD_NEG_013 | Create Product - XSS in Description | NEGATIVE | Attempt XSS in about field | 1. Enter: "<img src=x onerror=alert('xss')>"<br>2. Click "Save" | Input sanitized, no script execution | Not Started |
| TC_PRD_NEG_014 | Create Product - SQL Injection | NEGATIVE | SQL injection in name | 1. Name: "'; DROP TABLE produks; --"<br>2. Click "Save" | Input sanitized, no damage | Not Started |
| TC_PRD_NEG_015 | Edit Product - Empty Name | NEGATIVE | Clear name during edit | 1. Edit product<br>2. Clear name<br>3. Click "Update" | Validation error | Not Started |
| TC_PRD_NEG_016 | Edit Product - Null Category | NEGATIVE | Remove category from product | 1. Edit product<br>2. Clear category<br>3. Click "Update" | Validation error or prevented | Not Started |
| TC_PRD_NEG_017 | Edit Product - Null Brand | NEGATIVE | Remove brand from product | 1. Edit product<br>2. Clear brand<br>3. Click "Update" | Validation error or prevented | Not Started |
| TC_PRD_NEG_018 | Create Product - Duplicate Name Same Category | NEGATIVE | Create duplicate in same category | 1. Create product "Nike Air Max"<br>2. Create another "Nike Air Max" in same category | Either allowed or duplicate warning | Not Started |
| TC_PRD_NEG_019 | Unauthorized Product Creation | NEGATIVE | Non-admin creates product | 1. Login as non-admin<br>2. Try to create product | Access denied | Not Started |
| TC_PRD_NEG_020 | Create Product - Empty Description | NEGATIVE | Create without description | 1. Fill required fields<br>2. Leave about/description empty<br>3. Click "Save" | Either allowed (optional) or required error | Not Started |

---

## PROMO CODE MANAGEMENT TEST CASES

### Positive Test Cases

| Test ID | Test Name | Category | Description | Steps | Expected Result | Status |
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
| TC_PROMO_010 | Apply Promo to Transaction | POSITIVE | Use promo code in transaction | 1. Create transaction<br>2. Apply promo code "SAVE100"<br>3. Verify discount applied | Discount amount deducted from total | Not Started |

### Negative Test Cases

| Test ID | Test Name | Category | Description | Steps | Expected Result | Status |
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

## PRODUCT TRANSACTION TEST CASES

### Positive Test Cases

| Test ID | Test Name | Category | Description | Steps | Expected Result | Status |
|---------|-----------|----------|-------------|-------|-----------------|--------|
| TC_TRX_001 | Create Transaction - Complete Data | POSITIVE | Create transaction with all required fields | 1. Navigate to Transactions<br>2. Click "Create New"<br>3. Fill: name, phone, email, address, city, postcode<br>4. Select product, quantity, size<br>5. Click "Save" | Transaction created with unique booking_trx_id (TJH format) | Not Started |
| TC_TRX_002 | Transaction ID Auto-Generation | POSITIVE | Verify unique TJH-prefixed ID generation | 1. Create transaction<br>2. Check booking_trx_id field | ID in format TJH followed by 5 digits (e.g., TJH12345) | Not Started |
| TC_TRX_003 | Transaction with Promo Code | POSITIVE | Apply promo code to transaction | 1. Create transaction<br>2. Select promo code "SAVE100"<br>3. Fill other fields<br>4. Save | Discount applied, grand_total_amount reduced | Not Started |
| TC_TRX_004 | Calculate Sub Total | POSITIVE | Verify price × quantity calculation | 1. Product price: 100000<br>2. Quantity: 2<br>3. Save transaction | sub_total_amount = 200000 | Not Started |
| TC_TRX_005 | Calculate Grand Total with Discount | POSITIVE | Verify: grand_total = sub_total - discount | 1. Sub total: 200000<br>2. Discount: 50000<br>3. Save | grand_total = 150000 | Not Started |
| TC_TRX_006 | Transaction Without Promo Code | POSITIVE | Create transaction without promo (nullable) | 1. Create transaction<br>2. Leave promo code empty<br>3. Save | Transaction created, discount_amount = 0, promo_code_id = null | Not Started |
| TC_TRX_007 | Mark Transaction as Paid | POSITIVE | Set is_paid flag to true | 1. Create transaction<br>2. Check "Mark as Paid"<br>3. Upload proof<br>4. Save | Transaction marked as paid, proof stored | Not Started |
| TC_TRX_008 | Mark Transaction as Unpaid | POSITIVE | Transaction created with is_paid = false | 1. Create transaction<br>2. Leave "Paid" unchecked<br>3. Save | Transaction created with is_paid = false | Not Started |
| TC_TRX_009 | Transaction Proof Upload | POSITIVE | Upload payment proof image | 1. Create transaction<br>2. Mark as paid<br>3. Upload proof image<br>4. Save | Proof image stored and accessible | Not Started |
| TC_TRX_010 | View Transaction List | POSITIVE | Display all transactions | 1. Navigate to Transactions | All transactions listed with booking_trx_id, customer name, total | Not Started |
| TC_TRX_011 | Edit Transaction | POSITIVE | Modify transaction details | 1. Edit existing transaction<br>2. Change quantity<br>3. Update totals<br>4. Click "Update" | Changes saved, totals recalculated | Not Started |
| TC_TRX_012 | Edit Payment Status | POSITIVE | Change is_paid status | 1. Edit unpaid transaction<br>2. Check "Mark as Paid"<br>3. Update | Payment status changed | Not Started |
| TC_TRX_013 | Delete Transaction - Soft Delete | POSITIVE | Soft delete transaction | 1. Navigate to Transactions<br>2. Click delete<br>3. Confirm | Transaction removed from active list | Not Started |
| TC_TRX_014 | Restore Deleted Transaction | POSITIVE | Restore soft-deleted transaction | 1. Navigate to Transactions trash<br>2. Click restore<br>3. Confirm | Transaction restored | Not Started |
| TC_TRX_015 | Search Transactions by ID | POSITIVE | Search by booking_trx_id | 1. Navigate to Transactions<br>2. Search: "TJH12345" | Transaction with matching ID displayed | Not Started |
| TC_TRX_016 | Search Transactions by Customer Name | POSITIVE | Search by customer name | 1. Search: "John Doe" | Transactions with matching name displayed | Not Started |
| TC_TRX_017 | Search Transactions by Email | POSITIVE | Search by customer email | 1. Search: "john@example.com" | Transactions with matching email displayed | Not Started |
| TC_TRX_018 | Filter Transactions by Payment Status | POSITIVE | Filter paid/unpaid | 1. Select filter "Paid" or "Unpaid" | Transactions with correct status displayed | Not Started |
| TC_TRX_019 | Filter Transactions by Product | POSITIVE | Filter by specific product | 1. Select product filter<br>2. Choose a product | Transactions with selected product displayed | Not Started |
| TC_TRX_020 | Multiple Quantities Deduct Stock | POSITIVE | Verify stock deduction on purchase | 1. Product has 10 stock<br>2. Create transaction with quantity 3<br>3. Check product stock | Product stock reduced to 7 (if auto-deducted) | Not Started |
| TC_TRX_021 | Transaction with Multiple Sizes | POSITIVE | Handle product sizes in transaction | 1. Product has sizes: S, M, L<br>2. Create transaction selecting size "M"<br>3. Save | Size stored in produk_size field | Not Started |
| TC_TRX_022 | Email Validation | POSITIVE | Valid email format accepted | 1. Enter email: "john@example.com"<br>2. Save | Email accepted and stored | Not Started |
| TC_TRX_023 | Phone Number Validation | POSITIVE | Valid phone format accepted | 1. Enter phone: "+6281234567890"<br>2. Save | Phone accepted and stored | Not Started |
| TC_TRX_024 | Transaction Relationship with Product | POSITIVE | Verify product relationship | 1. Create transaction for product "Nike Air"<br>2. View transaction | Product name and details displayed | Not Started |

### Negative Test Cases

| Test ID | Test Name | Category | Description | Steps | Expected Result | Status |
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
| TC_TRX_NEG_011 | Create Transaction - Negative Quantity | NEGATIVE | Enter negative quantity | 1. Enter quantity: "-5"<br>2. Click "Save" | Validation error | Not Started |
| TC_TRX_NEG_012 | Create Transaction - Non-numeric Quantity | NEGATIVE | Enter text in quantity | 1. Enter quantity: "abc"<br>2. Click "Save" | Validation error | Not Started |
| TC_TRX_NEG_013 | Create Transaction - Quantity > Stock | NEGATIVE | Buy more than available stock | 1. Product stock: 5<br>2. Enter quantity: "10"<br>3. Click "Save" | Validation error: "Quantity exceeds stock" or prevented | Not Started |
| TC_TRX_NEG_014 | Create Transaction - Invalid Promo Code | NEGATIVE | Enter non-existent promo code | 1. Enter promo: "INVALID123"<br>2. Click "Save" | Error: "Promo code not found" or prevented | Not Started |
| TC_TRX_NEG_015 | Create Transaction - No Size Selected | NEGATIVE | Create without selecting product size | 1. Select product with sizes<br>2. Leave size empty<br>3. Click "Save" | Error: "Size is required" | Not Started |
| TC_TRX_NEG_016 | Create Transaction - Invalid Size | NEGATIVE | Select non-existent size | 1. Select size not in product options<br>2. Click "Save" | Validation error or prevented | Not Started |
| TC_TRX_NEG_017 | Create Transaction - Invalid Postcode Format | NEGATIVE | Enter invalid postcode | 1. Enter postcode: "abc"<br>2. Click "Save" | Either accepted or validated for numeric | Not Started |
| TC_TRX_NEG_018 | Create Transaction - Missing Proof When Paid | NEGATIVE | Mark paid without uploading proof | 1. Create transaction<br>2. Mark as "Paid"<br>3. Leave proof empty<br>4. Click "Save" | Validation error: "Proof required when paid" | Not Started |
| TC_TRX_NEG_019 | Create Transaction - Invalid Proof File | NEGATIVE | Upload non-image as proof | 1. Mark as paid<br>2. Upload .txt file<br>3. Click "Save" | File validation error | Not Started |
| TC_TRX_NEG_020 | Create Transaction - Proof Too Large | NEGATIVE | Upload proof image > 10MB | 1. Upload oversized proof<br>2. Click "Save" | File size error | Not Started |
| TC_TRX_NEG_021 | Create Transaction - SQL Injection in Name | NEGATIVE | Attempt SQL injection | 1. Name: "'; DROP TABLE product_transactions; --"<br>2. Click "Save" | Input sanitized, no damage | Not Started |
| TC_TRX_NEG_022 | Create Transaction - XSS in Address | NEGATIVE | Attempt XSS in address | 1. Address: "<script>alert('xss')</script>"<br>2. Click "Save" | Input sanitized, no script execution | Not Started |
| TC_TRX_NEG_023 | Edit Transaction - Quantity > Remaining Stock | NEGATIVE | Edit quantity to exceed stock | 1. Edit transaction<br>2. Change quantity to exceed stock<br>3. Update | Validation error | Not Started |
| TC_TRX_NEG_024 | Unauthorized Transaction Access | NEGATIVE | Non-admin creates transaction | 1. Login as non-admin<br>2. Try to create transaction | Access denied or limited access | Not Started |

---

## PRODUCT PHOTO TEST CASES

### Positive Test Cases

| Test ID | Test Name | Category | Description | Steps | Expected Result | Status |
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

## PRODUCT SIZE TEST CASES

### Positive Test Cases

| Test ID | Test Name | Category | Description | Steps | Expected Result | Status |
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

## SUMMARY

### Test Case Count by Module

| Module | Positive | Negative | Total |
|--------|----------|----------|-------|
| Category | 10 | 10 | 20 |
| Brand | 10 | 10 | 20 |
| Product | 21 | 20 | 41 |
| Promo Code | 10 | 12 | 22 |
| Transaction | 24 | 24 | 48 |
| Photo | 6 | 5 | 11 |
| Size | 8 | 5 | 13 |
| **TOTAL** | **89** | **86** | **175** |

### Key Testing Recommendations

1. **Data Validation**: All numeric fields (price, stock, discount) require boundary testing
2. **Security**: All string inputs need XSS and SQL injection testing
3. **Business Logic**: Verify calculations (totals, discounts, stock deductions)
4. **File Uploads**: Test file type, size, and content validation
5. **Relationships**: Verify foreign key constraints and cascading behavior
6. **Soft Deletes**: Confirm data recovery from trash
7. **Slug Generation**: Verify URL-friendly slug creation from names
8. **Unique Constraints**: Test duplicate detection (codes, names)
9. **Authorization**: Test role-based access control
10. **Edge Cases**: Test boundary values, empty states, and extreme inputs

### Test Execution Order Recommendation

1. Start with Category and Brand (foundational entities)
2. Move to Product (depends on Category/Brand)
3. Test Product Photos and Sizes (product features)
4. Test Promo Codes (independent feature)
5. Test Transactions (depends on Products and Promo Codes)

---

**End of Test Cases Document**
`