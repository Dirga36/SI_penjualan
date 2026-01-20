<?php

namespace App\Filament\Resources\PromoCodes;

use App\Filament\Resources\PromoCodes\Pages\CreatePromoCode;
use App\Filament\Resources\PromoCodes\Pages\EditPromoCode;
use App\Filament\Resources\PromoCodes\Pages\ListPromoCodes;
use App\Filament\Resources\PromoCodes\Schemas\PromoCodeForm;
use App\Filament\Resources\PromoCodes\Tables\PromoCodesTable;
use App\Models\PromoCode;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

// Resource untuk mengelola kode promo di panel admin Filament
class PromoCodeResource extends Resource
{
    // Model Eloquent yang digunakan oleh resource ini
    protected static ?string $model = PromoCode::class;

    // Ikon yang ditampilkan di menu navigasi (ikon hadiah)
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGift;

    // Konfigurasi form untuk create dan edit kode promo
    public static function form(Schema $schema): Schema
    {
        return PromoCodeForm::configure($schema);
    }

    // Konfigurasi tabel untuk menampilkan daftar kode promo
    public static function table(Table $table): Table
    {
        return PromoCodesTable::configure($table);
    }

    // Relasi yang tersedia untuk resource ini (kosong untuk saat ini)
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    // Mendefinisikan halaman-halaman yang tersedia untuk resource kode promo
    public static function getPages(): array
    {
        return [
            'index' => ListPromoCodes::route('/'),
            'create' => CreatePromoCode::route('/create'),
            'edit' => EditPromoCode::route('/{record}/edit'),
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
