<?php

namespace App\Filament\Exports;

use App\Models\ProductTransaction;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;
use OpenSpout\Common\Entity\Style\CellAlignment;
use OpenSpout\Common\Entity\Style\CellVerticalAlignment;
use OpenSpout\Common\Entity\Style\Color;
use OpenSpout\Common\Entity\Style\Style;

class ProductTransactionExporter extends Exporter
{
    protected static ?string $model = ProductTransaction::class;

    public static function getColumns(): array
    {
        return [
            // Transaction Information
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('booking_trx_id')
                ->label('Transaction ID'),

            // Customer Information
            ExportColumn::make('name')
                ->label('Customer Name'),
            ExportColumn::make('phone')
                ->label('Phone Number'),
            ExportColumn::make('email')
                ->label('Email Address'),

            // Shipping Information
            ExportColumn::make('address')
                ->label('Delivery Address'),
            ExportColumn::make('city')
                ->label('City'),
            ExportColumn::make('post_code')
                ->label('Postal Code'),

            // Product Information
            ExportColumn::make('produk.name')
                ->label('Product Name'),
            ExportColumn::make('produk_size')
                ->label('Size'),
            ExportColumn::make('quantity')
                ->label('Quantity'),

            // Pricing Information
            ExportColumn::make('sub_total_ammount')
                ->label('Subtotal'),
            ExportColumn::make('discount_ammount')
                ->label('Discount Amount'),
            ExportColumn::make('grand_total_ammount')
                ->label('Total Amount'),

            // Payment Information
            ExportColumn::make('is_paid')
                ->label('Payment Status'),
            ExportColumn::make('proof')
                ->label('Payment Proof'),
            ExportColumn::make('promoCode.id')
                ->label('Promo Code'),

            // Metadata
            ExportColumn::make('created_at')
                ->label('Created At'),
            ExportColumn::make('updated_at')
                ->label('Updated At'),
            ExportColumn::make('deleted_at')
                ->label('Deleted At'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your product transaction export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }

    public function getXlsxCellStyle(): ?Style
    {
        return (new Style())
        ->setFontBold()
        ->setFontItalic()
        ->setFontSize(14)
        ->setFontName('Consolas')
        ->setFontColor(Color::rgb(255, 255, 77))
        ->setBackgroundColor(Color::rgb(0, 0, 0))
        ->setCellAlignment(CellAlignment::CENTER)
        ->setCellVerticalAlignment(CellVerticalAlignment::CENTER);
    }
}
