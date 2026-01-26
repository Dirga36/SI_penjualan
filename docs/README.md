# UML Class Diagram Summary

## Quick Overview

This directory contains the **UML Class Diagram** for the SI Penjualan (Sales Information System) Laravel application.

## Files

| File | Format | Use Case |
|------|--------|----------|
| `class-diagram.puml` | PlantUML | Full-featured diagram with detailed notation, best for documentation and printing |
| `class-diagram.mmd` | Mermaid | GitHub-compatible format, renders automatically in markdown files |
| `CLASS_DIAGRAM.md` | Markdown | Comprehensive documentation explaining all classes and relationships |

## Class Diagram Components

### A. Set of Classes (8 Total)

1. **User** - Authentication and user management
2. **Category** - Product categorization
3. **Brand** - Product brand/manufacturer
4. **Produk** - Central product entity (core)
5. **ProdukPhoto** - Product photo gallery
6. **ProdukSize** - Product size options
7. **PromoCode** - Discount code management
8. **ProductTransaction** - Customer orders/bookings

### B. Set of Relationships (6 Total)

1. **Category → Produk** (One-to-Many)
   - One category contains many products

2. **Brand → Produk** (One-to-Many)
   - One brand has many products

3. **Produk → ProdukPhoto** (One-to-Many Composition)
   - One product contains many photos

4. **Produk → ProdukSize** (One-to-Many Composition)
   - One product has many size options

5. **Produk → ProductTransaction** (One-to-Many)
   - One product can be ordered in many transactions

6. **PromoCode → ProductTransaction** (One-to-Many Optional)
   - One promo code can apply discount to many transactions

## Key Architectural Features

### Design Patterns
- **Soft Deletion**: All content models preserve deleted data
- **Auto-slug Generation**: Category, Brand, and Produk auto-generate URL-friendly slugs
- **Unique ID Generation**: ProductTransaction generates unique TJH-prefixed IDs
- **Composition Pattern**: Photos and Sizes cascade delete with parent Product

### Database Constraints
- **Cascade Delete**: Category/Brand → Produk → Photos/Sizes/Transactions
- **Null on Delete**: PromoCode → ProductTransaction (optional)
- **Foreign Keys**: All relationships enforced at database level

## How to View

### Option 1: GitHub (Mermaid)
Copy the content from `class-diagram.mmd` into any GitHub markdown file to auto-render.

### Option 2: PlantUML Online
1. Visit https://www.plantuml.com/plantuml/uml/
2. Copy content from `class-diagram.puml`
3. Paste to view rendered diagram

### Option 3: Local IDE
Install PlantUML extension in VS Code, IntelliJ IDEA, or PhpStorm.

## Detailed Documentation

See **[CLASS_DIAGRAM.md](CLASS_DIAGRAM.md)** for complete documentation including:
- Detailed class descriptions
- All attributes and methods
- Relationship explanations
- Multiplicity details
- Architectural patterns
- Database conventions

## Diagram Structure

```
Central Entity: Produk (Product)
├── Belongs to → Category
├── Belongs to → Brand
├── Contains → ProdukPhoto (many)
├── Contains → ProdukSize (many)
└── Ordered in → ProductTransaction (many)

Supporting Entities:
├── PromoCode → applies to → ProductTransaction
└── User (authentication, standalone)
```

## Quick Stats

- **Total Classes**: 8
- **Total Relationships**: 6
- **Composition Relationships**: 2 (ProdukPhoto, ProdukSize)
- **Association Relationships**: 4 (Category, Brand, ProductTransaction, PromoCode)
- **Models with Soft Delete**: 7 (all except User)
- **Models with Auto-slug**: 3 (Category, Brand, Produk)

---

For questions or updates to the class diagram, please refer to the actual model implementations in `app/Models/` and migrations in `database/migrations/`.
