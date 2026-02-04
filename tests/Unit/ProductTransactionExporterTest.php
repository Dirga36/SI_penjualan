<?php

namespace Tests\Unit;

use App\Filament\Exports\ProductTransactionExporter;
use OpenSpout\Common\Entity\Style\Border;
use OpenSpout\Common\Entity\Style\CellAlignment;
use OpenSpout\Common\Entity\Style\Color;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Test untuk memastikan ProductTransactionExporter memiliki styling yang profesional
 */
class ProductTransactionExporterTest extends TestCase
{
    /**
     * Test bahwa header cell style dikonfigurasi dengan styling profesional
     */
    public function test_header_cell_style_is_professional(): void
    {
        // Gunakan reflection untuk memanggil method tanpa instantiasi
        $reflection = new ReflectionClass(ProductTransactionExporter::class);
        $method = $reflection->getMethod('getXlsxHeaderCellStyle');

        // Buat instance tanpa constructor
        $exporter = $reflection->newInstanceWithoutConstructor();
        $headerStyle = $method->invoke($exporter);

        // Memastikan style tidak null
        $this->assertNotNull($headerStyle);

        // Memastikan font bold untuk header
        $this->assertTrue($headerStyle->isFontBold());

        // Memastikan menggunakan font Calibri
        $this->assertEquals('Calibri', $headerStyle->getFontName());

        // Memastikan ukuran font 11
        $this->assertEquals(11, $headerStyle->getFontSize());

        // Memastikan warna font putih
        $this->assertEquals(Color::WHITE, $headerStyle->getFontColor());

        // Memastikan background color adalah biru profesional (RGB: 68, 114, 196)
        $this->assertEquals(Color::rgb(68, 114, 196), $headerStyle->getBackgroundColor());

        // Memastikan alignment center
        $this->assertEquals(CellAlignment::CENTER, $headerStyle->getCellAlignment());

        // Memastikan ada border
        $this->assertInstanceOf(Border::class, $headerStyle->getBorder());
    }

    /**
     * Test bahwa data cell style dikonfigurasi untuk readability
     */
    public function test_data_cell_style_is_readable(): void
    {
        // Gunakan reflection untuk memanggil method tanpa instantiasi
        $reflection = new ReflectionClass(ProductTransactionExporter::class);
        $method = $reflection->getMethod('getXlsxCellStyle');

        // Buat instance tanpa constructor
        $exporter = $reflection->newInstanceWithoutConstructor();
        $cellStyle = $method->invoke($exporter);

        // Memastikan style tidak null
        $this->assertNotNull($cellStyle);

        // Memastikan menggunakan font Calibri
        $this->assertEquals('Calibri', $cellStyle->getFontName());

        // Memastikan ukuran font 10
        $this->assertEquals(10, $cellStyle->getFontSize());

        // Memastikan warna font hitam
        $this->assertEquals(Color::BLACK, $cellStyle->getFontColor());

        // Memastikan alignment left untuk data
        $this->assertEquals(CellAlignment::LEFT, $cellStyle->getCellAlignment());

        // Memastikan ada border
        $this->assertInstanceOf(Border::class, $cellStyle->getBorder());
    }

    /**
     * Test bahwa header style berbeda dari cell style
     */
    public function test_header_and_cell_styles_are_different(): void
    {
        // Gunakan reflection untuk memanggil method tanpa instantiasi
        $reflection = new ReflectionClass(ProductTransactionExporter::class);
        $exporter = $reflection->newInstanceWithoutConstructor();

        $headerMethod = $reflection->getMethod('getXlsxHeaderCellStyle');
        $cellMethod = $reflection->getMethod('getXlsxCellStyle');

        $headerStyle = $headerMethod->invoke($exporter);
        $cellStyle = $cellMethod->invoke($exporter);

        // Memastikan keduanya tidak null
        $this->assertNotNull($headerStyle);
        $this->assertNotNull($cellStyle);

        // Memastikan background color berbeda
        $this->assertNotEquals(
            $headerStyle->getBackgroundColor(),
            $cellStyle->getBackgroundColor()
        );

        // Memastikan font color berbeda
        $this->assertNotEquals(
            $headerStyle->getFontColor(),
            $cellStyle->getFontColor()
        );

        // Memastikan header bold tapi cell tidak
        $this->assertTrue($headerStyle->isFontBold());
        $this->assertFalse($cellStyle->isFontBold());
    }
}
