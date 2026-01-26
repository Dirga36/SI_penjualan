# UML Class Diagram - SI Penjualan

## Overview

This document describes the UML class diagram for the **SI Penjualan** (Sales Information System), a Laravel 12 e-commerce application for managing products, categories, brands, and customer transactions.

> **Note**: The class diagram accurately reflects the actual database schema and model implementations, including field names as they exist in the codebase. For example, `discount_ammount` is spelled as-is in the actual database schema.

## Diagram Files

- **PlantUML Source**: [`class-diagram.puml`](class-diagram.puml)
- **Format**: PlantUML (can be rendered using various PlantUML tools)

## How to View the Diagram

### Online Rendering
1. Visit [PlantUML Online Editor](https://www.plantuml.com/plantuml/uml/)
2. Copy the content from `class-diagram.puml`
3. Paste into the editor to view the rendered diagram

### Local Rendering
```bash
# Install PlantUML (requires Java)
# macOS
brew install plantuml

# Ubuntu/Debian
sudo apt-get install plantuml

# Generate PNG from .puml file
plantuml docs/class-diagram.puml
```

### IDE Integration
- **VS Code**: Install the "PlantUML" extension
- **IntelliJ IDEA**: Built-in PlantUML support
- **PhpStorm**: Built-in PlantUML support

## Classes Overview

The diagram identifies **8 main classes** with their relationships:

### 1. User
**Purpose**: Authentication and user management

**Attributes**:
- `id` (PK): Primary key
- `name`: User's full name
- `email`: Unique email address for login
- `password`: Hashed password
- `email_verified_at`: Email verification timestamp
- `remember_token`: Remember me token

**Key Features**:
- Built-in Laravel authentication model
- Password auto-hashing
- Email verification support

---

### 2. Category
**Purpose**: Product categorization and organization

**Attributes**:
- `id` (PK): Primary key
- `name`: Category name (e.g., "Shoes", "Clothing")
- `slug`: Auto-generated URL-friendly version of name
- `icon`: Path to category icon image
- `deleted_at`: Soft deletion timestamp

**Relationships**:
- **Has Many** → `Produk` (One category contains many products)

**Key Features**:
- Auto-generates slug from name attribute
- Supports soft deletion
- Visual icon for UI representation

---

### 3. Brand
**Purpose**: Product brand/manufacturer management

**Attributes**:
- `id` (PK): Primary key
- `name`: Brand name (e.g., "Nike", "Adidas")
- `slug`: Auto-generated URL-friendly version of name
- `logo`: Path to brand logo image
- `deleted_at`: Soft deletion timestamp

**Relationships**:
- **Has Many** → `Produk` (One brand has many products)

**Key Features**:
- Auto-generates slug from name attribute
- Supports soft deletion
- Logo branding support

---

### 4. Produk (Product)
**Purpose**: Central entity representing products in the e-commerce system

**Attributes**:
- `id` (PK): Primary key
- `name`: Product name
- `slug`: Auto-generated URL-friendly version of name
- `thumbnail`: Main product image path
- `about`: Product description/details
- `price`: Product price (unsigned big integer)
- `stock`: Available quantity
- `is_popular`: Flag for featured/popular products
- `category_id` (FK): Foreign key to Category
- `brand_id` (FK): Foreign key to Brand
- `deleted_at`: Soft deletion timestamp

**Relationships**:
- **Belongs To** → `Category` (Product belongs to one category)
- **Belongs To** → `Brand` (Product belongs to one brand)
- **Has Many** → `ProdukPhoto` (Product has multiple photos) - Composition
- **Has Many** → `ProdukSize` (Product has multiple size options) - Composition
- **Has Many** → `ProductTransaction` (Product can be in multiple transactions)

**Key Features**:
- Central entity with most relationships
- Auto-generates slug from name
- Inventory management via stock field
- Popular products flag for featured listings
- Soft deletion enabled

---

### 5. ProdukPhoto
**Purpose**: Product photo gallery management

**Attributes**:
- `id` (PK): Primary key
- `photo`: Path to photo file
- `produk_id` (FK): Foreign key to Produk
- `deleted_at`: Soft deletion timestamp

**Relationships**:
- **Belongs To** → `Produk` (Photo belongs to one product) - Composition

**Key Features**:
- Multiple photos per product for carousel/gallery
- Cascade deletion with parent product
- Soft deletion support

---

### 6. ProdukSize
**Purpose**: Product size variants management

**Attributes**:
- `id` (PK): Primary key
- `size`: Size label (e.g., "S", "M", "L", "42")
- `produk_id` (FK): Foreign key to Produk
- `deleted_at`: Soft deletion timestamp

**Relationships**:
- **Belongs To** → `Produk` (Size belongs to one product) - Composition

**Key Features**:
- Multiple size options per product
- Supports any size format (clothing, shoes, etc.)
- Cascade deletion with parent product
- Soft deletion support

---

### 7. PromoCode
**Purpose**: Promotional discount code management

**Attributes**:
- `id` (PK): Primary key
- `code`: Unique promo code string (e.g., "SUMMER2026")
- `discount_ammount`: Fixed discount amount (Note: field name uses 'ammount' as per actual database schema)
- `deleted_at`: Soft deletion timestamp

**Relationships**:
- **Has Many** → `ProductTransaction` (One promo code can be used in multiple transactions)

**Key Features**:
- Fixed-amount discount system
- Optional application to transactions
- Soft deletion support

---

### 8. ProductTransaction
**Purpose**: Customer order/booking management

**Attributes**:
- `id` (PK): Primary key
- `booking_trx_id`: Unique transaction ID with "TJH" prefix
- Customer Information:
  - `name`: Customer full name
  - `phone`: Customer phone number
  - `email`: Customer email address
- Shipping Information:
  - `address`: Full shipping address
  - `city`: Shipping city
  - `post_code`: Postal/ZIP code
- Order Details:
  - `quantity`: Number of items ordered
  - `produk_size`: Selected product size
- Pricing:
  - `sub_total_amount`: Subtotal before discount
  - `grand_total_amount`: Final amount after discount
  - `discount_amount`: Total discount applied
- Payment:
  - `is_paid`: Payment status flag
  - `proof`: Path to payment proof image
- Foreign Keys:
  - `produk_id` (FK): Foreign key to Produk
  - `promo_code_id` (FK, nullable): Optional foreign key to PromoCode
- `deleted_at`: Soft deletion timestamp

**Relationships**:
- **Belongs To** → `Produk` (Transaction is for one product)
- **Belongs To** → `PromoCode` (Transaction optionally uses one promo code)

**Key Features**:
- Unique transaction ID generation (TJH12345 format)
- Complete customer and shipping information
- Discount calculation support
- Payment tracking
- Soft deletion support

---

## Relationships Summary

### Association Relationships (BelongsTo / HasMany)

1. **Category ←→ Produk**: One-to-Many
   - One category can have many products
   - Each product belongs to one category
   - Cascade delete on category removal

2. **Brand ←→ Produk**: One-to-Many
   - One brand can have many products
   - Each product belongs to one brand
   - Cascade delete on brand removal

3. **Produk ←→ ProductTransaction**: One-to-Many
   - One product can be in many transactions
   - Each transaction is for one product
   - Cascade delete on product removal

4. **PromoCode ←→ ProductTransaction**: One-to-Many (Optional)
   - One promo code can be used in many transactions
   - Each transaction optionally uses one promo code
   - Set null on promo code removal

### Composition Relationships (Strong Ownership)

5. **Produk ←→ ProdukPhoto**: One-to-Many (Composition)
   - One product contains many photos
   - Photos cannot exist without parent product
   - Cascade delete when product is deleted

6. **Produk ←→ ProdukSize**: One-to-Many (Composition)
   - One product contains many size options
   - Sizes cannot exist without parent product
   - Cascade delete when product is deleted

## Key Architectural Patterns

### 1. Slug Generation
Classes with names auto-generate URL-friendly slugs:
- `Category::setNameAttribute()`
- `Brand::setNameAttribute()`
- `Produk::setNameAttribute()`

Example: "Nike Air Max 90" → "nike-air-max-90"

### 2. Soft Deletes
All content models use soft deletion:
- Records are marked as deleted (`deleted_at` timestamp)
- Data is preserved in the database
- Can be restored if needed
- Applied to: Category, Brand, Produk, ProdukPhoto, ProdukSize, PromoCode, ProductTransaction

### 3. Transaction ID Generation
`ProductTransaction::generateUniqueTrxId()` creates unique IDs:
- Format: TJH + 5-digit random number
- Example: TJH54321
- Ensures uniqueness through database checks

### 4. Foreign Key Constraints
- **Cascade Delete**: When parent is deleted, children are deleted
  - Category → Produk
  - Brand → Produk
  - Produk → ProdukPhoto
  - Produk → ProdukSize
  - Produk → ProductTransaction

- **Null on Delete**: When parent is deleted, foreign key is set to null
  - PromoCode → ProductTransaction (optional relationship)

## Database Conventions

### Naming Conventions
- **Table Names**: Plural, snake_case (e.g., `produks`, `product_transactions`)
- **Model Names**: Singular, PascalCase (e.g., `Produk`, `ProductTransaction`)
- **Attributes**: snake_case in database
- **Foreign Keys**: `{model}_id` (e.g., `brand_id`, `category_id`)

### Standard Fields
All models include:
- `id`: Auto-incrementing primary key
- `created_at`: Record creation timestamp
- `updated_at`: Last modification timestamp
- `deleted_at`: Soft deletion timestamp (if using SoftDeletes)

## UML Diagram Components

### Classes
The diagram shows **8 classes** representing the core entities of the system:
1. User
2. Category
3. Brand
4. Produk (Product)
5. ProdukPhoto
6. ProdukSize
7. PromoCode
8. ProductTransaction

### Relationships
The diagram shows **6 key relationships**:
1. Category → Produk (One-to-Many)
2. Brand → Produk (One-to-Many)
3. Produk → ProdukPhoto (One-to-Many Composition)
4. Produk → ProdukSize (One-to-Many Composition)
5. Produk → ProductTransaction (One-to-Many)
6. PromoCode → ProductTransaction (One-to-Many Optional)

## Multiplicities

- **1** : Exactly one
- **0..1** : Zero or one (optional)
- **0..*** : Zero or more
- **1..*** : One or more

## Diagram Notation

- **──>** : Association (BelongsTo relationship)
- **──*** : Composition (HasMany with strong ownership)
- **{PK}** : Primary Key
- **{FK}** : Foreign Key
- **{unique}** : Unique constraint
- **{nullable}** : Optional/nullable field

## Tech Stack Context

- **Framework**: Laravel 12
- **PHP Version**: 8.2+
- **ORM**: Eloquent ORM
- **Database**: Supports SQLite (local dev) and others
- **Testing**: PHPUnit 11

## Related Documentation

- [Project README](../README.md) - Main project documentation
- [Database Migrations](../database/migrations/) - Schema definitions
- [Model Classes](../app/Models/) - Eloquent model implementations

## Contributing

When modifying the class diagram:

1. Update the PlantUML source file (`class-diagram.puml`)
2. Update this README if relationships change
3. Ensure diagram matches actual model implementations
4. Re-render the diagram to verify syntax

## Questions or Issues?

For questions about the class diagram or data model, please refer to:
- The model files in `app/Models/`
- The migration files in `database/migrations/`
- The project's main README.md
