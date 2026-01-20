<?php

namespace App\Filament\Resources\Brands;

use App\Filament\Resources\Brands\Pages\CreateBrand;
use App\Filament\Resources\Brands\Pages\EditBrand;
use App\Filament\Resources\Brands\Pages\ListBrands;
use App\Filament\Resources\Brands\Schemas\BrandForm;
use App\Filament\Resources\Brands\Tables\BrandsTable;
use App\Models\Brand;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

// Resource untuk mengelola brand di panel admin Filament
class BrandResource extends Resource
{
    // Model Eloquent yang digunakan oleh resource ini
    protected static ?string $model = Brand::class;

    // Ikon yang ditampilkan di menu navigasi (ikon bintang)
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedStar;

    // Konfigurasi form untuk create dan edit brand
    public static function form(Schema $schema): Schema
    {
        return BrandForm::configure($schema);
    }

    // Konfigurasi tabel untuk menampilkan daftar brand
    public static function table(Table $table): Table
    {
        return BrandsTable::configure($table);
    }

    // Relasi yang tersedia untuk resource ini (kosong untuk saat ini)
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    // Mendefinisikan halaman-halaman yang tersedia untuk resource brand
    public static function getPages(): array
    {
        return [
            'index' => ListBrands::route('/'),
            'create' => CreateBrand::route('/create'),
            'edit' => EditBrand::route('/{record}/edit'),
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
