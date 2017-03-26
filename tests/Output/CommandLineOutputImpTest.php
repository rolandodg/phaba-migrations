<?php
declare(strict_types=1);

namespace Phaba\Migrations\Tests\Output;

use Phaba\Migrations\Output\CommandLineOutputImp;
use Phaba\Migrations\Output\CommandLineOutputPrinterImp;
use PHPUnit\Framework\TestCase;
use Phaba\Migrations\Tests\TestHelper\AccessibilityTestHelper;

class CommandLineOutputImpTest extends TestCase
{
    /**
     * @var AccessibilityTestHelper
     */
    private $accessibilityHelper;

    public function setUp()
    {
        parent::setUp();

        $this->accessibilityHelper = new AccessibilityTestHelper();
    }

    public function createCommandLineOutput(CommandLineOutputPrinterImp $printer = null): CommandLineOutputImp
    {
        if ($printer === null) {
            $printer = new CommandLineOutputPrinterImp();
        }
        return new CommandLineOutputImp($printer);
    }

    /**
     * @dataProvider propertiesProvider
     */
    public function testSetterReturnsOwnObject($property, $value): void
    {
        $output = $this->createCommandLineOutput();
        $returnedValue = $output->setContent($value);

        $this->assertInstanceOf(CommandLineOutputImp::class, $returnedValue);
    }

    public function propertiesProvider()
    {
        return [
            ['content', ['Teenage Mutant Ninja Turtles']]
        ];
    }

    public function testOutputIsPrintedWhenItISProcessed(): void
    {
        $printer = $this->getMockBuilder(CommandLineOutputPrinterImp::class)
            ->setMethods(['print'])
            ->getMock();

        $printer->expects($this->once())
            ->method('print')
            ->with(['Teenage Mutant Ninja turtle']);

        $output = $this->createCommandLineOutput($printer);

        $this->accessibilityHelper->setNotAccessiblePropertyValue($output, 'content', ['Teenage Mutant Ninja turtle']);

        $output->process();
    }
}
