## Getting Started

### Deps 
- [NodeJS 22](https://nodejs.org)
- [Composer 2.8](https://getcomposer.org)
- [PHP 8](https://www.php.net/)

### 1. Install dependensi

```powershell
npm install --legacy-peer-deps
composer install
```

### 2. Generate dan sesuaikan file .env

- 1. generate

```powershell
copy .env.example .env
```

- 2. sesuaikan database (jenis database dan nama database_)

```txt
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel 
# DB_USERNAME=root
# DB_PASSWORD=
```

### 3. Generate application key

```powershell
php artisan key:generate
```

### 4. Database migration

```powershell
php artisan migrate
```

### 4. Jalankan development server

```powershell
composer run dev
```

Buka <a href="http://127.0.0.1:8000">http://127.0.0.1:8000</a> Dengan browser untuk melihat hasilnya.
