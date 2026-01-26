# Use Case Diagram & Features Summary

## Documentation Created

This repository now includes comprehensive documentation for the SI Penjualan (Sales Information System) e-commerce application:

### 📄 Documents

1. **[USE_CASE_DIAGRAM.md](USE_CASE_DIAGRAM.md)** - Complete use case diagram with:
   - Visual Mermaid diagram
   - 2 main actors (Customer and Admin)
   - 17 use cases across 4 feature areas
   - Detailed use case descriptions
   - Technical architecture highlights

2. **[MAIN_FEATURES.md](MAIN_FEATURES.md)** - Comprehensive features documentation with:
   - 5 major feature categories
   - Detailed feature descriptions
   - Feature matrix by user role
   - Technical implementation details
   - Future enhancement opportunities

3. **[use_case_diagram.puml](use_case_diagram.puml)** - PlantUML source for UML rendering

---

## Quick Overview

### 🎭 Actors
- **Customer (Pelanggan)**: End-users who browse and purchase products
- **Admin**: System administrators who manage the platform

### 📦 Main Feature Categories

#### 1. Product Catalog Management
- Product CRUD operations
- Multi-photo galleries
- Size variants
- Category organization
- Brand management
- Popular products feature

#### 2. Shopping & Browsing Features
- Product browsing
- Detailed product views
- Category and brand filtering
- Popular products showcase

#### 3. Transaction & Checkout System
- Unique transaction ID generation (TJH-prefix)
- Complete customer information capture
- Automatic price calculations
- Payment proof upload
- Transaction status tracking

#### 4. Promotional System
- Promo code management
- Fixed-amount discounts
- Discount application and display

#### 5. Data Management
- Soft delete implementation
- Automatic slug generation
- Foreign key relationships
- Data integrity features

---

## 🎯 Use Cases Summary

**Customer Use Cases (10)**:
- Browse Products
- View Product Details
- Filter by Category
- Filter by Brand
- View Popular Products
- Create Transaction/Booking
- Apply Promo Code
- Upload Payment Proof
- View Transaction Status
- View Discount Details

**Admin Use Cases (7)**:
- Manage Products
- Manage Categories
- Manage Brands
- Manage Product Photos
- Manage Product Sizes
- Manage Promo Codes
- Process Payment

**Shared Use Cases (1)**:
- View Transaction Status

---

## 🏗️ Technical Stack

- **Framework**: Laravel 12
- **PHP**: 8.2
- **Database**: SQLite/MySQL (migration-based)
- **Frontend**: Blade, Vite, Tailwind CSS 4
- **Testing**: PHPUnit 11
- **Code Style**: Laravel Pint

---

## 📊 Key Insights

### Database Entities
7 main entities with well-defined relationships:
- Produk (Product)
- Category
- Brand
- ProductTransaction
- PromoCode
- ProdukPhoto
- ProdukSize

### Design Patterns
- MVC Architecture
- Soft Delete Pattern
- Factory Pattern
- Eloquent ORM
- Auto-slug Generation

### Business Features
- ✅ E-commerce functionality
- ✅ Multi-variant products (photos, sizes)
- ✅ Category and brand organization
- ✅ Promotional code system
- ✅ Transaction management
- ✅ Payment proof handling
- ✅ SEO-friendly URLs

---

## 📈 Future Opportunities

The application has a solid foundation and can be extended with:
- User authentication
- Order history
- Product reviews
- Shopping cart
- Email notifications
- Payment gateway integration
- Admin dashboard
- Analytics and reporting

---

## 📖 How to Use This Documentation

1. **For System Understanding**: Start with [MAIN_FEATURES.md](MAIN_FEATURES.md)
2. **For Requirements Analysis**: Review [USE_CASE_DIAGRAM.md](USE_CASE_DIAGRAM.md)
3. **For UML Tools**: Use [use_case_diagram.puml](use_case_diagram.puml)

All documentation is based on actual codebase analysis and reflects the current implementation in the repository.
