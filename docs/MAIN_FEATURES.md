# Main Features - SI Penjualan (Sales Information System)

## Overview
This document identifies and describes the main features of the SI Penjualan e-commerce application based on the codebase analysis.

---

## Feature Categories

### 1. Product Catalog Management 🛍️

#### 1.1 Product Management (CRUD)
- **Create Products**: Add new products with complete information
  - Name (auto-generates SEO-friendly slug)
  - Thumbnail image
  - Description/About
  - Price
  - Stock quantity
  - Popular flag (for featured products)
  - Category assignment
  - Brand assignment

- **Update Products**: Modify existing product information
- **Delete Products**: Soft delete products (data preservation)
- **View Products**: Display product listings and details

#### 1.2 Multi-Photo Gallery
- Upload multiple photos per product
- Support for product image galleries
- Relationship: One product has many photos

#### 1.3 Size Variants
- Define multiple sizes per product
- Support for size selection during purchase
- Relationship: One product has many sizes

#### 1.4 Category Organization
- **Create Categories**: Define product categories with icons
- **Auto-slug Generation**: SEO-friendly URLs from category names
- **Category Filtering**: Browse products by category
- **Soft Delete**: Preserve category data

#### 1.5 Brand Management
- **Create Brands**: Define brands with logos
- **Auto-slug Generation**: SEO-friendly URLs from brand names
- **Brand Filtering**: Browse products by brand
- **Soft Delete**: Preserve brand data

#### 1.6 Popular Products Feature
- Flag products as popular/featured (`is_popular` boolean)
- Display featured products prominently
- Marketing and promotion capability

---

### 2. Shopping & Browsing Features 🛒

#### 2.1 Product Browsing
- Browse all available products
- View product thumbnails, names, and prices
- Product listing pages

#### 2.2 Product Details
- Detailed product information display
- Multiple product photos gallery
- Available sizes display
- Product description
- Price and stock information
- Brand and category information

#### 2.3 Search & Filter
- **Filter by Category**: Browse products in specific categories
- **Filter by Brand**: Browse products from specific brands
- **View Popular Products**: See featured/trending items

#### 2.4 Product Information
- Name and description
- Pricing information
- Stock availability
- Brand association
- Category classification
- SEO-friendly URLs (slug-based)

---

### 3. Transaction & Checkout System 💳

#### 3.1 Transaction Creation
- **Customer Information Capture**:
  - Full name
  - Email address
  - Phone number
  - Delivery city
  - Postal code
  - Complete address

- **Order Information**:
  - Product selection
  - Size selection
  - Quantity selection
  - Unique booking transaction ID (TJH-prefixed)

#### 3.2 Unique Transaction ID Generation
- Auto-generated unique booking IDs
- Format: TJH + 5-digit random number (e.g., TJH12345)
- Collision prevention (checks uniqueness)

#### 3.3 Price Calculation
- **Sub-total**: Product price × Quantity
- **Discount**: Applied from promo code
- **Grand Total**: Sub-total - Discount
- Automatic calculation

#### 3.4 Payment Processing
- **Payment Proof Upload**: Customer uploads payment evidence (image)
- **Payment Status**: Track paid/unpaid status (`is_paid` boolean)
- **Payment Verification**: Admin can verify and mark as paid

#### 3.5 Transaction Status Tracking
- View transaction details
- Check payment status
- Order information review
- Available to both customers and admins

---

### 4. Promotional System 🎁

#### 4.1 Promo Code Management
- **Create Promo Codes**: Define promotional codes
  - Unique code string (e.g., "SUMMER2026")
  - Fixed discount amount
- **Update/Delete Promo Codes**: Manage existing codes
- **Soft Delete**: Preserve promo code history

#### 4.2 Discount Application
- Apply promo codes during checkout
- Automatic discount calculation
- Optional promo code usage
- Display discount amount to customers

#### 4.3 Discount Display
- Show discount details in transaction
- Transparent pricing breakdown
- Customer-friendly discount information

---

### 5. Data Management & System Features ⚙️

#### 5.1 Soft Delete Implementation
- All main entities use soft deletes
- Data preservation for historical records
- Applicable to:
  - Products
  - Categories
  - Brands
  - Promo Codes
  - Product Transactions

#### 5.2 Automatic Slug Generation
- SEO-friendly URLs
- Auto-generated from names
- Implemented for:
  - Products
  - Categories
  - Brands

#### 5.3 Database Relationships
- **Product ↔ Category**: Many-to-One
- **Product ↔ Brand**: Many-to-One
- **Product ↔ Photos**: One-to-Many
- **Product ↔ Sizes**: One-to-Many
- **Transaction ↔ Product**: Many-to-One
- **Transaction ↔ Promo Code**: Many-to-One (optional)

#### 5.4 Data Integrity
- Foreign key constraints
- Cascade delete on relationships
- Unique constraints (transaction IDs, promo codes)

#### 5.5 Factory & Seeding Support
- Test data generation
- Development environment setup
- Factory pattern implementation

---

## Feature Matrix by User Role

| Feature | Customer | Admin |
|---------|----------|-------|
| Browse Products | ✅ | ✅ |
| View Product Details | ✅ | ✅ |
| Filter by Category | ✅ | ✅ |
| Filter by Brand | ✅ | ✅ |
| View Popular Products | ✅ | ✅ |
| Create Transaction | ✅ | ❌ |
| Apply Promo Code | ✅ | ❌ |
| Upload Payment Proof | ✅ | ❌ |
| View Transaction Status | ✅ | ✅ |
| Manage Products | ❌ | ✅ |
| Manage Categories | ❌ | ✅ |
| Manage Brands | ❌ | ✅ |
| Manage Product Photos | ❌ | ✅ |
| Manage Product Sizes | ❌ | ✅ |
| Manage Promo Codes | ❌ | ✅ |
| Process Payment | ❌ | ✅ |

---

## Technical Features

### Framework & Technologies
- **Backend**: Laravel 12
- **PHP Version**: 8.2
- **Database**: SQLite/MySQL (migration-based)
- **Frontend**: Blade templates, Vite, Tailwind CSS 4
- **ORM**: Eloquent
- **Testing**: PHPUnit 11
- **Code Style**: Laravel Pint

### Architecture Patterns
- **MVC Pattern**: Model-View-Controller architecture
- **Repository Pattern**: Eloquent models as data repositories
- **Factory Pattern**: For test data generation
- **Soft Delete Pattern**: Data preservation strategy
- **Slug Generation**: SEO optimization pattern

### Key Technical Implementations
1. **Mass Assignment Protection**: Explicit `$fillable` arrays
2. **Type Casting**: Type-safe data handling
3. **Relationship Definitions**: Strongly-typed Eloquent relationships
4. **Unique ID Generation**: Custom algorithm for transaction IDs
5. **Automatic Slug Creation**: Mutator-based slug generation

---

## Future Enhancement Opportunities

### Potential Additional Features
1. **User Authentication**: Customer login/registration system
2. **Order History**: Customer's past transaction viewing
3. **Product Reviews**: Customer rating and review system
4. **Wishlist**: Save favorite products
5. **Shopping Cart**: Multi-product checkout
6. **Inventory Management**: Stock tracking and alerts
7. **Reporting**: Sales analytics and reports
8. **Search Functionality**: Product search by name/description
9. **Email Notifications**: Order confirmations and updates
10. **Payment Gateway Integration**: Online payment processing
11. **Shipping Integration**: Delivery tracking
12. **Multi-image Upload**: Bulk photo management
13. **Product Variants**: Color, material variations
14. **Percentage Discounts**: Alternative promo code types
15. **Admin Dashboard**: Analytics and insights

---

## Summary

The SI Penjualan application is a well-structured e-commerce platform with **5 major feature categories** and **17 distinct use cases**. It provides:

- ✅ Complete product catalog management
- ✅ Rich shopping and browsing experience
- ✅ Full transaction and checkout system
- ✅ Promotional code functionality
- ✅ Robust data management with soft deletes
- ✅ SEO-friendly architecture
- ✅ Clean separation between customer and admin roles

The application is built on Laravel 12 with modern PHP practices, ready for extension and enhancement as business needs grow.
