<?php

namespace App\Filament\Resources\Produks;

use App\Filament\Resources\Produks\Pages\CreateProduk;
use App\Filament\Resources\Produks\Pages\EditProduk;
use App\Filament\Resources\Produks\Pages\ListProduks;
use App\Filament\Resources\Produks\Schemas\ProdukForm;
use App\Filament\Resources\Produks\Tables\ProduksTable;
use App\Models\Produk;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

// Resource untuk mengelola produk di panel admin Filament
class ProdukResource extends Resource
{
    // Model Eloquent yang digunakan oleh resource ini
    protected static ?string $model = Produk::class;

    // Ikon yang ditampilkan di menu navigasi (ikon tas belanja)
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShoppingBag;

    // Konfigurasi form untuk create dan edit produk
    public static function form(Schema $schema): Schema
    {
        return ProdukForm::configure($schema);
    }

    // Konfigurasi tabel untuk menampilkan daftar produk
    public static function table(Table $table): Table
    {
        return ProduksTable::configure($table);
    }

    // Relasi yang tersedia untuk resource ini (kosong untuk saat ini)
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    // Mendefinisikan halaman-halaman yang tersedia untuk resource produk
    public static function getPages(): array
    {
        return [
            'index' => ListProduks::route('/'),
            'create' => CreateProduk::route('/create'),
            'edit' => EditProduk::route('/{record}/edit'),
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
