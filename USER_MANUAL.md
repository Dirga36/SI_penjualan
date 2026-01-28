# Buku Manual Pengguna SI Penjualan
## Sistem Informasi Penjualan E-Commerce

**Versi:** 1.0  
**Tanggal:** Januari 2026  
**Platform:** Laravel 12 + Filament Admin Panel

---

## Daftar Isi

1. [Pengenalan Sistem](#1-pengenalan-sistem)
2. [Persyaratan Sistem](#2-persyaratan-sistem)
3. [Instalasi dan Konfigurasi](#3-instalasi-dan-konfigurasi)
4. [Memulai Aplikasi](#4-memulai-aplikasi)
5. [Antarmuka Pengguna](#5-antarmuka-pengguna)
6. [Manajemen Kategori](#6-manajemen-kategori)
7. [Manajemen Brand](#7-manajemen-brand)
8. [Manajemen Produk](#8-manajemen-produk)
9. [Manajemen Kode Promo](#9-manajemen-kode-promo)
10. [Manajemen Transaksi](#10-manajemen-transaksi)
11. [Fitur-Fitur Lanjutan](#11-fitur-fitur-lanjutan)
12. [Troubleshooting](#12-troubleshooting)
13. [FAQ](#13-faq)
14. [Spesifikasi Teknis](#14-spesifikasi-teknis)

---

## 1. Pengenalan Sistem

### 1.1 Tentang SI Penjualan

SI Penjualan (Sistem Informasi Penjualan) adalah aplikasi e-commerce berbasis web yang dirancang untuk mengelola penjualan produk secara online. Sistem ini menyediakan panel administrasi yang lengkap dan mudah digunakan untuk mengelola semua aspek bisnis e-commerce Anda.

**[GAMBAR SLOT 1: Screenshot Dashboard Utama]**

### 1.2 Fitur Utama

Aplikasi ini dilengkapi dengan fitur-fitur berikut:

- ✅ **Manajemen Produk** - Kelola produk dengan mudah termasuk foto, ukuran, dan variasi
- ✅ **Manajemen Kategori** - Organisasi produk berdasarkan kategori
- ✅ **Manajemen Brand** - Kelola merek produk
- ✅ **Kode Promosi** - Buat dan kelola kode diskon untuk pelanggan
- ✅ **Transaksi Penjualan** - Lacak dan kelola transaksi pelanggan
- ✅ **Soft Delete** - Data yang dihapus dapat dipulihkan
- ✅ **Auto Slug Generation** - URL otomatis dihasilkan dari nama produk
- ✅ **Dashboard Admin Modern** - Antarmuka yang intuitif dengan Filament

**[GAMBAR SLOT 2: Diagram Alur Fitur Sistem]**

### 1.3 Keuntungan Menggunakan SI Penjualan

- **Mudah Digunakan** - Antarmuka admin yang intuitif dan user-friendly
- **Skalabel** - Dapat menangani ribuan produk dan transaksi
- **Aman** - Dibangun dengan framework Laravel yang terpercaya
- **Fleksibel** - Mudah dikustomisasi sesuai kebutuhan bisnis
- **Modern** - Menggunakan teknologi terkini (Laravel 12, Tailwind CSS 4)

---

## 2. Persyaratan Sistem

### 2.1 Server Requirements

**Minimum:**
- PHP 8.2 atau lebih tinggi
- MySQL 8.0 / PostgreSQL 13 / SQLite 3.8.8
- Composer 2.x
- Node.js 18.x atau lebih tinggi
- NPM 9.x atau lebih tinggi

**Rekomendasi:**
- PHP 8.3
- MySQL 8.0 atau PostgreSQL 15
- 2GB RAM minimum
- 10GB ruang disk
- SSL Certificate untuk production

### 2.2 PHP Extensions Required

Pastikan ekstensi PHP berikut terinstall:
- BCMath
- Ctype
- Fileinfo
- JSON
- Mbstring
- OpenSSL
- PDO
- Tokenizer
- XML
- GD atau Imagick (untuk image processing)

**[GAMBAR SLOT 3: Checklist Persyaratan Sistem]**

### 2.3 Browser Compatibility

Aplikasi dapat diakses melalui browser modern:
- Google Chrome (versi terbaru)
- Mozilla Firefox (versi terbaru)
- Microsoft Edge (versi terbaru)
- Safari (versi terbaru)

---

## 3. Instalasi dan Konfigurasi

### 3.1 Instalasi Dasar

#### Langkah 1: Clone atau Download Project

```bash
git clone <repository-url> SI_penjualan
cd SI_penjualan
```

**[GAMBAR SLOT 4: Screenshot Terminal Clone Repository]**

#### Langkah 2: Instalasi Dependencies

Gunakan perintah setup yang sudah disediakan:

```bash
composer run setup
```

Perintah ini akan otomatis:
- Install dependencies Composer
- Install dependencies NPM
- Membuat file `.env`
- Generate application key
- Menjalankan migrasi database

**[GAMBAR SLOT 5: Screenshot Proses Instalasi]**

#### Langkah 3: Konfigurasi Database

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=si_penjualan
DB_USERNAME=root
DB_PASSWORD=your_password
```

Untuk development lokal, Anda dapat menggunakan SQLite:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

#### Langkah 4: Jalankan Migrasi (Jika Belum)

```bash
php artisan migrate
```

**[GAMBAR SLOT 6: Screenshot Hasil Migrasi Database]**

#### Langkah 5: Buat Admin User

Buat user admin pertama melalui tinker:

```bash
php artisan tinker
```

Kemudian jalankan:

```php
\App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => bcrypt('password')
]);
```

### 3.2 Konfigurasi File Storage

Buat symlink untuk storage publik:

```bash
php artisan storage:link
```

**[GAMBAR SLOT 7: Screenshot Struktur Folder Storage]**

### 3.3 Konfigurasi Tambahan (Opsional)

#### Mail Configuration

Untuk fitur email (notifikasi, reset password):

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
```

#### Queue Configuration

Untuk proses background:

```env
QUEUE_CONNECTION=database
```

---

## 4. Memulai Aplikasi

### 4.1 Menjalankan Development Server

#### Opsi 1: Menggunakan Perintah Cepat

```bash
composer run dev
```

Perintah ini akan menjalankan:
- Laravel development server
- Queue worker (untuk background jobs)
- Log viewer (Laravel Pail)
- Vite development server (untuk assets)

**[GAMBAR SLOT 8: Screenshot Terminal Running Dev Server]**

#### Opsi 2: Menjalankan Manual

Terminal 1 - Laravel Server:
```bash
php artisan serve
```

Terminal 2 - Frontend Assets:
```bash
npm run dev
```

### 4.2 Mengakses Admin Panel

Buka browser dan akses:
```
http://localhost:8000/admin
```

**[GAMBAR SLOT 9: Screenshot Halaman Login Admin]**

Login menggunakan kredensial admin yang telah dibuat:
- Email: `admin@example.com`
- Password: `password`

### 4.3 Dashboard Overview

Setelah login, Anda akan melihat dashboard admin dengan menu navigasi di sidebar:

**[GAMBAR SLOT 10: Screenshot Dashboard Lengkap dengan Navigasi]**

Menu utama yang tersedia:
- **Dashboard** - Ringkasan data dan statistik
- **Produk** - Manajemen produk
- **Kategori** - Manajemen kategori
- **Brand** - Manajemen brand
- **Kode Promo** - Manajemen promosi
- **Transaksi** - Manajemen transaksi penjualan

---

## 5. Antarmuka Pengguna

### 5.1 Layout Dashboard

Dashboard menggunakan Filament Admin Panel dengan komponen:

1. **Top Navigation Bar**
   - User profile dropdown
   - Notifications
   - Search global

2. **Sidebar Navigation**
   - Menu navigasi utama
   - Dapat collapse/expand

3. **Content Area**
   - Area kerja utama
   - Breadcrumb navigation
   - Action buttons

**[GAMBAR SLOT 11: Annotated Screenshot Layout Dashboard]**

### 5.2 Tabel Data (Data Tables)

Semua halaman list menggunakan tabel interaktif dengan fitur:

- **Search/Filter** - Cari data dengan keyword
- **Sorting** - Urutkan kolom ascending/descending
- **Pagination** - Navigasi halaman data
- **Bulk Actions** - Aksi untuk multiple record sekaligus
- **Inline Actions** - Edit, View, Delete per row

**[GAMBAR SLOT 12: Screenshot Contoh Tabel Data]**

### 5.3 Form Input

Form input dilengkapi dengan:
- Validasi real-time
- Helper text dan tooltips
- Auto-save draft (pada beberapa form)
- Responsive design

**[GAMBAR SLOT 13: Screenshot Contoh Form Input]**

---

## 6. Manajemen Kategori

### 6.1 Tentang Kategori

Kategori digunakan untuk mengorganisir produk berdasarkan jenisnya. Setiap produk harus memiliki satu kategori.

### 6.2 Melihat Daftar Kategori

1. Klik menu **Categories** di sidebar
2. Tabel akan menampilkan semua kategori yang tersedia
3. Gunakan search box untuk mencari kategori tertentu

**[GAMBAR SLOT 14: Screenshot List Categories]**

### 6.3 Menambah Kategori Baru

**Langkah-langkah:**

1. Klik tombol **"New Category"** di pojok kanan atas
2. Isi form dengan data berikut:

   **Field yang wajib diisi:**
   - **Name** - Nama kategori (contoh: "Pakaian Pria")
   - **Icon** - Icon untuk kategori (format: text/icon class)

   **Field opsional:**
   - Slug akan otomatis dihasilkan dari Name

3. Klik tombol **"Create"** untuk menyimpan

**[GAMBAR SLOT 15: Screenshot Form Tambah Kategori]**

### 6.4 Mengedit Kategori

1. Pada list categories, klik icon **Edit (pensil)** pada row kategori
2. Ubah data yang diperlukan
3. Klik **"Save"** untuk menyimpan perubahan

**[GAMBAR SLOT 16: Screenshot Form Edit Kategori]**

### 6.5 Menghapus Kategori

1. Klik icon **Delete (trash)** pada row kategori
2. Konfirmasi penghapusan
3. Kategori akan di-soft delete (tidak permanen)

**⚠️ Peringatan:** Pastikan tidak ada produk yang masih menggunakan kategori tersebut sebelum menghapus.

**[GAMBAR SLOT 17: Screenshot Dialog Konfirmasi Hapus]**

### 6.6 Memulihkan Kategori Terhapus

Kategori yang dihapus menggunakan soft delete dapat dipulihkan melalui:
1. Filter "Trashed" pada tabel
2. Pilih kategori yang ingin dipulihkan
3. Klik action "Restore"

---

## 7. Manajemen Brand

### 7.1 Tentang Brand

Brand/merek digunakan untuk mengidentifikasi produsen atau merek produk. Setiap produk harus memiliki satu brand.

### 7.2 Melihat Daftar Brand

1. Klik menu **Brands** di sidebar
2. Tabel akan menampilkan semua brand yang tersedia

**[GAMBAR SLOT 18: Screenshot List Brands]**

### 7.3 Menambah Brand Baru

**Langkah-langkah:**

1. Klik tombol **"New Brand"**
2. Isi form dengan data berikut:

   **Field yang wajib diisi:**
   - **Name** - Nama brand (contoh: "Nike", "Adidas")
   - **Logo** - Upload logo brand (format: JPG, PNG, max 2MB)

3. Klik **"Create"**

**[GAMBAR SLOT 19: Screenshot Form Tambah Brand dengan Upload Logo]**

### 7.4 Mengedit Brand

Sama seperti kategori, klik Edit pada row brand yang ingin diubah.

### 7.5 Menghapus Brand

**⚠️ Peringatan:** Pastikan tidak ada produk yang menggunakan brand tersebut.

---

## 8. Manajemen Produk

### 8.1 Tentang Produk

Produk adalah entitas utama dalam sistem. Setiap produk dapat memiliki:
- Multiple photos (foto produk)
- Multiple sizes (ukuran/variasi)
- Relasi ke brand dan kategori
- Status "Popular" untuk highlight produk

### 8.2 Melihat Daftar Produk

1. Klik menu **Produk** di sidebar
2. Tabel menampilkan produk dengan kolom:
   - Thumbnail
   - Nama produk
   - Brand
   - Kategori
   - Harga
   - Status Popular
   - Actions

**[GAMBAR SLOT 20: Screenshot List Produk dengan Thumbnail]**

### 8.3 Menambah Produk Baru

**Langkah-langkah:**

1. Klik tombol **"New Produk"**

2. **Tab: Informasi Dasar**
   
   Isi field berikut:
   - **Name** - Nama produk lengkap
   - **Brand** - Pilih brand dari dropdown
   - **Category** - Pilih kategori dari dropdown
   - **Price** - Harga produk (format: numeric)
   - **About** - Deskripsi detail produk (textarea)
   - **Is Popular** - Toggle untuk menandai produk populer

**[GAMBAR SLOT 21: Screenshot Form Produk - Tab Informasi Dasar]**

3. **Tab: Foto Produk**

   - Klik **"Add Photo"**
   - Upload foto produk (JPG/PNG, max 5MB per foto)
   - Ulangi untuk menambah foto lainnya
   - Drag & drop untuk mengatur urutan

**[GAMBAR SLOT 22: Screenshot Form Produk - Tab Upload Foto dengan Preview]**

4. **Tab: Ukuran/Sizes**

   - Klik **"Add Size"**
   - Masukkan ukuran (contoh: S, M, L, XL, atau 38, 40, 42)
   - Ulangi untuk menambah ukuran lainnya

**[GAMBAR SLOT 23: Screenshot Form Produk - Tab Sizes]**

5. Klik **"Create"** untuk menyimpan produk

### 8.4 Mengedit Produk

1. Klik icon Edit pada row produk
2. Ubah data yang diperlukan
3. Untuk menghapus foto atau size, klik icon delete pada item tersebut
4. Klik **"Save"**

**[GAMBAR SLOT 24: Screenshot Edit Produk dengan Multiple Relasi]**

### 8.5 Menghapus Produk

⚠️ **Penting:** Menghapus produk akan otomatis menghapus:
- Semua foto produk (cascade delete)
- Semua size produk (cascade delete)

**[GAMBAR SLOT 25: Screenshot Warning Message Sebelum Hapus Produk]**

### 8.6 Filter dan Search Produk

Gunakan fitur filter untuk mencari produk berdasarkan:
- Keyword nama produk
- Brand tertentu
- Kategori tertentu
- Status popular
- Range harga

**[GAMBAR SLOT 26: Screenshot Filter Panel Produk]**

---

## 9. Manajemen Kode Promo

### 9.1 Tentang Kode Promo

Kode promo digunakan untuk memberikan diskon kepada pelanggan. Sistem mendukung:
- Kode unik untuk setiap promo
- Jumlah diskon tetap
- Status aktif/tidak aktif

### 9.2 Melihat Daftar Kode Promo

Menu: **Promo Codes**

Tabel menampilkan:
- Kode promo
- Jumlah diskon
- Status
- Actions

**[GAMBAR SLOT 27: Screenshot List Promo Codes]**

### 9.3 Menambah Kode Promo Baru

**Langkah-langkah:**

1. Klik **"New Promo Code"**
2. Isi form:

   - **Code** - Kode unik (contoh: "DISKON50", "PROMO2026")
   - **Discount Amount** - Jumlah diskon dalam rupiah

3. Klik **"Create"**

**💡 Tips:** Gunakan kode yang mudah diingat pelanggan namun tetap unik.

**[GAMBAR SLOT 28: Screenshot Form Tambah Promo Code]**

### 9.4 Mengedit dan Menonaktifkan Kode Promo

- Edit untuk mengubah jumlah diskon
- Soft delete untuk menonaktifkan kode promo

---

## 10. Manajemen Transaksi

### 10.1 Tentang Transaksi Produk

Setiap transaksi pelanggan tercatat dalam sistem dengan informasi lengkap:
- ID Transaksi unik (prefix: TJH-)
- Produk yang dibeli
- Quantity
- Kode promo (jika ada)
- Total harga
- Jumlah diskon
- Status pembayaran

### 10.2 Melihat Daftar Transaksi

Menu: **Product Transactions**

**[GAMBAR SLOT 29: Screenshot List Transaksi dengan Status]**

Kolom yang ditampilkan:
- **Booking TRX ID** - ID transaksi unik
- **Produk** - Nama produk yang dibeli
- **Quantity** - Jumlah item
- **Grand Total** - Total pembayaran
- **Discount** - Jumlah potongan harga
- **Status** - Paid/Unpaid
- **Tanggal Transaksi**

### 10.3 Menambah Transaksi Manual

**Langkah-langkah:**

1. Klik **"New Transaction"**

2. Isi form:
   - **Produk** - Pilih produk dari dropdown
   - **Quantity** - Jumlah item yang dibeli
   - **Promo Code** (Opsional) - Pilih kode promo jika ada
   - **Name** - Nama pembeli
   - **Email** - Email pembeli
   - **Phone** - No. telepon pembeli
   - **Address** - Alamat pengiriman
   - **City** - Kota tujuan
   - **Post Code** - Kode pos
   - **Is Paid** - Toggle status pembayaran

**[GAMBAR SLOT 30: Screenshot Form Transaksi - Bagian Detail Produk]**

**[GAMBAR SLOT 31: Screenshot Form Transaksi - Bagian Customer Info]**

3. Sistem akan otomatis:
   - Generate booking TRX ID (format: TJH-XXXXXXXXX)
   - Hitung grand total berdasarkan (price × quantity)
   - Kurangi discount amount jika ada promo code
   - Update grand total amount setelah diskon

4. Klik **"Create"**

### 10.4 Melihat Detail Transaksi

Klik pada row transaksi atau icon View untuk melihat:
- Informasi lengkap transaksi
- Detail produk
- Data customer
- Riwayat status pembayaran

**[GAMBAR SLOT 32: Screenshot Detail View Transaksi]**

### 10.5 Mengubah Status Pembayaran

1. Edit transaksi yang dipilih
2. Toggle **"Is Paid"** untuk mengubah status
3. Save perubahan

**[GAMBAR SLOT 33: Screenshot Toggle Payment Status]**

### 10.6 Filter Transaksi

Gunakan filter untuk mencari transaksi:
- Berdasarkan status pembayaran (Paid/Unpaid)
- Berdasarkan produk
- Berdasarkan tanggal
- Berdasarkan ID transaksi

**[GAMBAR SLOT 34: Screenshot Filter Transaksi]**

### 10.7 Export Data Transaksi

Untuk keperluan laporan:
1. Klik icon Export (biasanya di header tabel)
2. Pilih format (CSV/Excel)
3. File akan di-download otomatis

**[GAMBAR SLOT 35: Screenshot Export Options]**

---

## 11. Fitur-Fitur Lanjutan

### 11.1 Bulk Actions

Pilih multiple records dengan checkbox, kemudian pilih action:
- Bulk Delete
- Bulk Status Change
- Bulk Export

**[GAMBAR SLOT 36: Screenshot Bulk Actions]**

### 11.2 Global Search

Gunakan search box di top navigation untuk mencari data di seluruh sistem:
- Produk
- Kategori
- Brand
- Transaksi

**[GAMBAR SLOT 37: Screenshot Global Search dengan Results]**

### 11.3 Notifications

Sistem akan menampilkan notifikasi untuk:
- Transaksi baru
- Update penting
- Error atau warning

**[GAMBAR SLOT 38: Screenshot Notification Panel]**

### 11.4 User Profile Management

Klik avatar di pojok kanan atas untuk:
- Edit profil
- Ubah password
- Logout

**[GAMBAR SLOT 39: Screenshot User Profile Dropdown]**

### 11.5 Dark Mode (Jika Tersedia)

Toggle tema gelap/terang sesuai preferensi.

**[GAMBAR SLOT 40: Comparison Screenshot Light vs Dark Mode]**

---

## 12. Troubleshooting

### 12.1 Masalah Login

**Problem:** Tidak bisa login / Forgot password

**Solusi:**
1. Reset password melalui artisan tinker:
```bash
php artisan tinker
$user = \App\Models\User::where('email', 'admin@example.com')->first();
$user->password = bcrypt('newpassword');
$user->save();
```

2. Atau buat user baru jika perlu

---

### 12.2 Error "Class not found"

**Solusi:**
```bash
composer dump-autoload
php artisan config:clear
php artisan cache:clear
```

---

### 12.3 Upload File Gagal

**Problem:** Tidak bisa upload foto produk atau logo

**Solusi:**
1. Pastikan symlink storage sudah dibuat:
```bash
php artisan storage:link
```

2. Periksa permission folder storage:
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

3. Periksa file size limit di php.ini:
```ini
upload_max_filesize = 10M
post_max_size = 10M
```

---

### 12.4 Halaman Blank/500 Error

**Solusi:**
1. Enable debug mode di `.env`:
```env
APP_DEBUG=true
```

2. Check log error:
```bash
php artisan pail
# atau
tail -f storage/logs/laravel.log
```

3. Clear cache:
```bash
php artisan optimize:clear
```

---

### 12.5 Migration Error

**Problem:** Error saat menjalankan `php artisan migrate`

**Solusi:**
1. Drop semua tabel dan migrate ulang:
```bash
php artisan migrate:fresh
```

2. Atau rollback bertahap:
```bash
php artisan migrate:rollback
php artisan migrate
```

---

### 12.6 Assets Not Loading

**Problem:** CSS/JS tidak load dengan benar

**Solusi:**
1. Rebuild assets:
```bash
npm run build
```

2. Atau jalankan dev server:
```bash
npm run dev
```

---

### 12.7 Queue Jobs Not Processing

**Solusi:**
```bash
php artisan queue:work
# atau gunakan
composer run dev
```

---

### 12.8 Database Connection Error

**Solusi:**
1. Periksa kredensial di `.env`
2. Pastikan database service running
3. Test koneksi:
```bash
php artisan db:show
```

---

## 13. FAQ

### Q1: Apakah sistem ini support multi-language?

**A:** Saat ini sistem menggunakan Bahasa Indonesia sebagai default. Untuk menambah multi-language, Anda perlu mengintegrasikan Laravel Localization.

---

### Q2: Bagaimana cara backup database?

**A:** 
```bash
# MySQL
mysqldump -u username -p database_name > backup.sql

# Atau gunakan Artisan command jika ada package backup
php artisan backup:run
```

---

### Q3: Apakah bisa integrasi payment gateway?

**A:** Ya, sistem ini dapat diintegrasikan dengan payment gateway seperti Midtrans, Xendit, atau payment provider lainnya dengan menambahkan package dan konfigurasi yang sesuai.

---

### Q4: Bagaimana cara menambah admin user baru?

**A:**
```bash
php artisan tinker
\App\Models\User::create([
    'name' => 'Nama Admin',
    'email' => 'email@example.com',
    'password' => bcrypt('password123')
]);
```

---

### Q5: Apakah produk yang dihapus bisa dipulihkan?

**A:** Ya, sistem menggunakan soft delete. Data yang dihapus tidak permanen dan bisa di-restore melalui filter "Trashed".

---

### Q6: Bagaimana cara mengubah logo aplikasi?

**A:** Ubah konfigurasi di `app/Providers/Filament/AdminPanelProvider.php` atau sesuaikan logo di folder `resources`.

---

### Q7: Batas maksimal upload foto produk?

**A:** Default 5MB per foto. Dapat diubah di konfigurasi php.ini atau di form validation.

---

### Q8: Apakah bisa export data ke Excel?

**A:** Ya, Filament mendukung export data. Klik tombol export pada tabel data.

---

### Q9: Bagaimana cara mengaktifkan email notifications?

**A:** Konfigurasi MAIL settings di file `.env` dengan SMTP credentials Anda.

---

### Q10: Apakah sistem ini mobile-responsive?

**A:** Ya, admin panel menggunakan Tailwind CSS yang responsive. Namun untuk pengalaman optimal, disarankan menggunakan desktop/laptop.

---

## 14. Spesifikasi Teknis

### 14.1 Teknologi yang Digunakan

| Komponen | Teknologi | Versi |
|----------|-----------|-------|
| Backend Framework | Laravel | 12.x |
| PHP | PHP | 8.2+ |
| Admin Panel | Filament | 3.x |
| Frontend CSS | Tailwind CSS | 4.x |
| Build Tool | Vite | Latest |
| Database | MySQL/PostgreSQL/SQLite | 8.0+ / 13+ / 3.8.8+ |
| Testing | PHPUnit | 11.x |
| Code Style | Laravel Pint | Latest |
| Package Manager | Composer | 2.x |

---

### 14.2 Struktur Database

#### Tabel: `users`
- id (PK)
- name
- email (unique)
- password
- timestamps

#### Tabel: `categories`
- id (PK)
- name
- slug (unique)
- icon
- deleted_at (soft delete)
- timestamps

#### Tabel: `brands`
- id (PK)
- name
- slug (unique)
- logo
- deleted_at
- timestamps

#### Tabel: `produks`
- id (PK)
- name
- slug (unique)
- about (text)
- price (decimal)
- is_popular (boolean)
- brand_id (FK → brands)
- category_id (FK → categories)
- deleted_at
- timestamps

#### Tabel: `produk_photos`
- id (PK)
- photo (string)
- produk_id (FK → produks, cascade delete)
- timestamps

#### Tabel: `produk_sizes`
- id (PK)
- size (string)
- produk_id (FK → produks, cascade delete)
- timestamps

#### Tabel: `promo_codes`
- id (PK)
- code (unique)
- discount_amount (decimal)
- deleted_at
- timestamps

#### Tabel: `product_transactions`
- id (PK)
- booking_trx_id (unique, TJH prefix)
- name (customer)
- email
- phone
- address (text)
- city
- post_code
- quantity
- grand_total_amount (decimal)
- discount_amount (decimal)
- is_paid (boolean)
- produk_id (FK → produks)
- promo_code_id (FK → promo_codes, nullable)
- deleted_at
- timestamps

**[GAMBAR SLOT 41: Database ERD Diagram]**

---

### 14.3 Relasi Antar Tabel

```
Brand (1) ← (Many) Produk
Category (1) ← (Many) Produk
Produk (1) ← (Many) ProdukPhoto
Produk (1) ← (Many) ProdukSize
Produk (1) ← (Many) ProductTransaction
PromoCode (1) ← (Many) ProductTransaction [optional]
```

---

### 14.4 API Endpoints (Jika Ada)

Saat ini sistem menggunakan panel admin Filament dan belum memiliki REST API publik. Untuk menambahkan API, gunakan Laravel Sanctum atau Passport.

---

### 14.5 Security Features

- **CSRF Protection** - Laravel default
- **XSS Protection** - Auto-escaped Blade templates
- **SQL Injection Protection** - Eloquent ORM & prepared statements
- **Password Hashing** - Bcrypt algorithm
- **Mass Assignment Protection** - Fillable attributes
- **Authentication** - Laravel Breeze/Sanctum
- **Authorization** - Filament Policies (dapat dikonfigurasi)

---

### 14.6 Performance Optimization

Sistem telah dioptimasi dengan:
- **Eager Loading** - Menghindari N+1 query problem
- **Database Indexing** - Pada foreign keys dan unique fields
- **Asset Bundling** - Vite untuk optimasi JS/CSS
- **Query Caching** - Dapat diaktifkan untuk data statis
- **Image Optimization** - Disarankan compress foto sebelum upload

---

### 14.7 Composer Scripts

Script yang tersedia via `composer run`:

```bash
composer run setup    # Full setup: install, env, migrate
composer run dev      # Run dev server + queue + logs + vite
composer test         # Run PHPUnit tests
```

---

### 14.8 Environment Variables Penting

```env
APP_NAME="SI Penjualan"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=si_penjualan
DB_USERNAME=root
DB_PASSWORD=

FILESYSTEM_DISK=public
QUEUE_CONNECTION=database
```

---

### 14.9 Folder Structure

```
SI_penjualan/
├── app/
│   ├── Models/              # Eloquent models
│   ├── Http/Controllers/    # Controllers
│   ├── Filament/
│   │   └── Resources/       # Filament resources & forms
│   └── Providers/
├── database/
│   ├── migrations/          # Database migrations
│   ├── factories/           # Model factories
│   └── seeders/             # Database seeders
├── public/                  # Public assets
├── resources/
│   ├── css/                 # Stylesheets
│   ├── js/                  # JavaScript
│   └── views/               # Blade templates
├── routes/                  # Route definitions
├── storage/                 # Logs, cache, uploads
├── tests/                   # PHPUnit tests
└── vendor/                  # Composer dependencies
```

---

### 14.10 Dependency Packages

**Production Dependencies:**
- `laravel/framework: ^12.0`
- `filament/filament: ^3.0`
- `livewire/livewire: ^3.0`

**Development Dependencies:**
- `laravel/pint` - Code style fixer
- `phpunit/phpunit: ^11.0` - Testing framework
- `fakerphp/faker` - Fake data generator
- `mockery/mockery` - Mocking library

Lihat `composer.json` untuk daftar lengkap dependencies.

---

## Lampiran

### A. Shortcut Keyboard (Filament Admin)

| Shortcut | Fungsi |
|----------|--------|
| `Ctrl + K` atau `Cmd + K` | Global search |
| `Esc` | Close modal/dialog |
| `Tab` | Navigate form fields |
| `Enter` | Submit form |

---

### B. Konvensi Penamaan

- **Model Names:** Singular, PascalCase (e.g., `Produk`, `Brand`)
- **Table Names:** Plural, snake_case (e.g., `produks`, `brands`)
- **Foreign Keys:** `{model}_id` (e.g., `brand_id`, `produk_id`)
- **Slugs:** Auto-generated dari name field, format: lowercase-with-dashes

---

### C. Checklist Deployment ke Production

- [ ] Set `APP_ENV=production` di `.env`
- [ ] Set `APP_DEBUG=false`
- [ ] Generate production key: `php artisan key:generate`
- [ ] Run migrations: `php artisan migrate --force`
- [ ] Optimize configs: `php artisan optimize`
- [ ] Link storage: `php artisan storage:link`
- [ ] Build assets: `npm run build`
- [ ] Setup proper file permissions (755 folders, 644 files)
- [ ] Configure web server (Nginx/Apache)
- [ ] Setup SSL certificate
- [ ] Configure backup strategy
- [ ] Setup monitoring & logging
- [ ] Enable queue worker (supervisor)

---

### D. Contact & Support

Untuk pertanyaan lebih lanjut, bug report, atau request fitur:

- **Developer:** [Your Name/Company]
- **Email:** support@example.com
- **Documentation:** [Link to online docs]
- **Repository:** [GitHub/GitLab URL]

---

### E. Changelog

**Version 1.0.0** (Januari 2026)
- Initial release
- Core features: Product, Category, Brand, Promo Code, Transaction management
- Filament Admin Panel integration
- Soft delete implementation
- Auto slug generation

---

## Penutup

Terima kasih telah menggunakan SI Penjualan. Semoga manual ini membantu Anda dalam menggunakan sistem dengan maksimal. 

Untuk update dan fitur-fitur baru, silakan pantau changelog dan dokumentasi online.

**Selamat menggunakan! 🎉**

---

**© 2026 SI Penjualan - Sistem Informasi Penjualan**  
**Manual Version 1.0**
