# AI Copilot Instructions - SI Penjualan Laravel Project

## Project Overview
**SI Penjualan** (Sales Information System) is a Laravel 12 e-commerce application for managing products, categories, brands, sizes, photos, promotional codes, and customer transactions.

### Tech Stack
- **Backend**: Laravel 12, PHP 8.2
- **Frontend**: Blade templates, Vite, Tailwind CSS 4, Axios
- **Database**: Migrations-based (supports SQLite for local dev)
- **Testing**: PHPUnit 11
- **Development**: Sail, Pint (code style), Laravel Pail (logging)

## Domain Model & Architecture

### Core Entities & Relationships
```
Product (Produk) - Central entity
├── belongsTo Brand (brand_id)
├── belongsTo Category (category_id)
├── hasMany ProdukPhoto (photos)
├── hasMany ProdukSize (sizes)
└── hasMany ProductTransaction (reverse relation)

ProductTransaction (Booking)
├── belongsTo Produk (produk_id)
├── belongsTo PromoCode (promo_code_id, nullable)
└── fields: booking_trx_id (unique TJH-prefixed), quantity, grand_total_amount, discount_amount, is_paid

Category, Brand, PromoCode
└── All use SoftDeletes and auto-slug generation from name attribute
```

### Key Architectural Patterns
- **Slug Generation**: Models with `setNameAttribute()` auto-generate URL-friendly slugs using `Str::slug()`
- **Soft Deletes**: Used across all content models (Produk, Category, Brand, etc.) for data preservation
- **Transaction ID Generation**: `ProductTransaction::generateUniqueTrxId()` creates unique TJH-prefixed IDs
- **Mass Assignment**: All fillable properties explicitly listed (no `*` wildcards)

## Development Workflows

### Local Setup
```bash
composer run setup        # Installs deps, creates .env, generates key, runs migrations
npm install              # Install frontend deps (already in setup)
```

### Development Server
```bash
composer run dev          # Runs Laravel server, queue listener, logs, Vite dev in parallel
```

### Testing & Code Quality
```bash
composer test             # Clear config cache and run PHPUnit tests
php artisan pint          # Fix code style issues (auto-formatting)
php artisan pail          # Real-time log streaming
```

### Database
- **Migrations Location**: `database/migrations/`
- **Convention**: Timestamp prefix + descriptive name (e.g., `2026_01_14_090850_create_produks_table.php`)
- **Seeders**: `database/seeders/DatabaseSeeder.php` available for data seeding
- **Factories**: `database/factories/UserFactory.php` for test data generation

## Code Conventions & Standards

### Model Best Practices
1. Use explicit `$fillable` arrays (security, clarity)
2. Implement `casts()` method for type conversion (not property-based)
3. Use `HasFactory` and `SoftDeletes` traits consistently
4. Define all relationships explicitly with proper types:
   ```php
   public function brand(): BelongsTo { return $this->belongsTo(Brand::class); }
   ```

### Naming Conventions
- **Table Names**: Plural, snake_case (e.g., `produks`, `product_transactions`)
- **Model Names**: Singular, PascalCase (e.g., `Produk`, `ProductTransaction`)
- **Attributes**: snake_case in database, camelCase in casts
- **Foreign Keys**: `{model}_id` (e.g., `brand_id`, `category_id`, `produk_id`)

### Frontend
- Routes in `routes/web.php` return Blade views
- Assets compiled with Vite: `npm run build` (production), `npm run dev` (development)
- CSS in `resources/css/app.css`, JS in `resources/js/`

## Common Tasks & Patterns

### Adding a New Model
1. Create model in `app/Models/` with traits: `HasFactory, SoftDeletes`
2. Create migration with `php artisan make:migration create_{table}_table`
3. Define relationships in model using proper return types
4. Add to `$fillable` array for mass assignment
5. Create factory in `database/factories/` if needed for tests

### Adding Product Features
- Photos: Use `ProdukPhoto` relationship (already has `photo` field)
- Sizes: Use `ProdukSize` relationship (already has `size` field)
- Discounts: Link `ProductTransaction` to `PromoCode` via foreign key
- Popularity: Toggle `is_popular` boolean on `Produk`

### Database Relationships
When adding relationships:
- Always specify foreign key explicitly: `->foreignId('category_id')->constrained()->cascadeOnDelete()`
- Use `BelongsTo`, `HasMany` with explicit return types for IDE support
- Ensure model relationship method name matches conventional usage

## Testing Conventions
- Tests in `tests/Feature/` and `tests/Unit/`
- Extend `Tests\TestCase` for framework features
- Use Faker from `fakerphp/faker` for test data
- Use Mockery for mocking (installed as dev dependency)

## Key Files Reference
- **Models**: `app/Models/*.php` - Domain entities with relationships
- **Migrations**: `database/migrations/` - Schema definitions, source of truth
- **Routes**: `routes/web.php` - Request routing (currently minimal)
- **Config**: `config/` - Laravel framework configuration
- **Composer Scripts**: Check `composer.json` `scripts` key for custom commands

## Commenting & Documentation
- Any comments should be written in Indonesian
