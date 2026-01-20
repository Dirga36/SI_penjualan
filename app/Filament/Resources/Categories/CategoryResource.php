<?php

namespace App\Filament\Resources\Categories;

use App\Filament\Resources\Categories\Pages\CreateCategory;
use App\Filament\Resources\Categories\Pages\EditCategory;
use App\Filament\Resources\Categories\Pages\ListCategories;
use App\Filament\Resources\Categories\Schemas\CategoryForm;
use App\Filament\Resources\Categories\Tables\CategoriesTable;
use App\Models\Category;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

// Resource untuk mengelola kategori di panel admin Filament
class CategoryResource extends Resource
{
    // Model Eloquent yang digunakan oleh resource ini
    protected static ?string $model = Category::class;

    // Ikon yang ditampilkan di menu navigasi (ikon tag)
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTag;

    // Konfigurasi form untuk create dan edit kategori
    public static function form(Schema $schema): Schema
    {
        return CategoryForm::configure($schema);
    }

    // Konfigurasi tabel untuk menampilkan daftar kategori
    public static function table(Table $table): Table
    {
        return CategoriesTable::configure($table);
    }

    // Relasi yang tersedia untuk resource ini (kosong untuk saat ini)
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    // Mendefinisikan halaman-halaman yang tersedia untuk resource kategori
    public static function getPages(): array
    {
        return [
            'index' => ListCategories::route('/'),
            'create' => CreateCategory::route('/create'),
            'edit' => EditCategory::route('/{record}/edit'),
        ];
    }

    // Query builder untuk route binding, termasuk record yang di-soft delete
    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        // Menampilkan juga data yang sudah dihapus (soft delete)
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
