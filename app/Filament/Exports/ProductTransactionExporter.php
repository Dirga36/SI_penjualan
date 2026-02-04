<?php

namespace App\Filament\Exports;

use App\Models\ProductTransaction;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;
use OpenSpout\Common\Entity\Style\Border;
use OpenSpout\Common\Entity\Style\BorderPart;
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
                ->label('Subtotal')
                ->formatStateUsing(fn ($state) => $state ? 'Rp '.number_format($state, 0, ',', '.') : '-'),
            ExportColumn::make('discount_ammount')
                ->label('Discount Amount')
                ->formatStateUsing(fn ($state) => $state ? 'Rp '.number_format($state, 0, ',', '.') : 'Rp 0'),
            ExportColumn::make('grand_total_ammount')
                ->label('Total Amount')
                ->formatStateUsing(fn ($state) => $state ? 'Rp '.number_format($state, 0, ',', '.') : '-'),

            // Payment Information
            ExportColumn::make('is_paid')
                ->label('Payment Status')
                ->formatStateUsing(fn ($state) => $state ? 'PAID' : 'UNPAID'),
            ExportColumn::make('proof')
                ->label('Payment Proof'),
            ExportColumn::make('promoCode.code')
                ->label('Promo Code')
                ->formatStateUsing(fn ($state) => $state ?? '-'),

            // Metadata
            ExportColumn::make('created_at')
                ->label('Created At')
                ->formatStateUsing(fn ($state) => $state ? $state->format('d/m/Y H:i') : '-'),
            ExportColumn::make('updated_at')
                ->label('Updated At')
                ->formatStateUsing(fn ($state) => $state ? $state->format('d/m/Y H:i') : '-'),
            ExportColumn::make('deleted_at')
                ->label('Deleted At')
                ->formatStateUsing(fn ($state) => $state ? $state->format('d/m/Y H:i') : '-'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your product transaction export has completed and '.Number::format($export->successful_rows).' '.str('row')->plural($export->successful_rows).' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' '.Number::format($failedRowsCount).' '.str('row')->plural($failedRowsCount).' failed to export.';
        }

        return $body;
    }

    /**
     * Style untuk header kolom spreadsheet
     * Menerapkan styling profesional dengan background biru, teks putih tebal
     */
    public function getXlsxHeaderCellStyle(): ?Style
    {
        return (new Style)
            ->setFontBold()
            ->setFontSize(11)
            ->setFontName('Calibri')
            ->setFontColor(Color::WHITE)
            ->setBackgroundColor(Color::rgb(68, 114, 196)) // Professional blue
            ->setCellAlignment(CellAlignment::CENTER)
            ->setCellVerticalAlignment(CellVerticalAlignment::CENTER)
            ->setBorder(new Border(
                new BorderPart(Border::BOTTOM, Color::BLACK, Border::WIDTH_MEDIUM),
                new BorderPart(Border::TOP, Color::BLACK, Border::WIDTH_THIN),
                new BorderPart(Border::LEFT, Color::BLACK, Border::WIDTH_THIN),
                new BorderPart(Border::RIGHT, Color::BLACK, Border::WIDTH_THIN)
            ));
    }

    /**
     * Style untuk sel data spreadsheet
     * Menerapkan styling bersih dan mudah dibaca dengan border tipis
     */
    public function getXlsxCellStyle(): ?Style
    {
        return (new Style)
            ->setFontSize(10)
            ->setFontName('Calibri')
            ->setFontColor(Color::BLACK)
            ->setCellAlignment(CellAlignment::LEFT)
            ->setCellVerticalAlignment(CellVerticalAlignment::CENTER)
            ->setBorder(new Border(
                new BorderPart(Border::BOTTOM, Color::rgb(217, 217, 217), Border::WIDTH_THIN),
                new BorderPart(Border::LEFT, Color::rgb(217, 217, 217), Border::WIDTH_THIN),
                new BorderPart(Border::RIGHT, Color::rgb(217, 217, 217), Border::WIDTH_THIN)
            ));
    }
}
