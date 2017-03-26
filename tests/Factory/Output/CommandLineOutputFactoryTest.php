<?php

declare(strict_types=1);

namespace Phaba\Migrations\Tests\Factory\Output;

use Phaba\Migrations\Factory\Output\CommandLineOutputFactory;
use Phaba\Migrations\Output\CommandLineOutputImp;
use Phaba\Migrations\Output\CommandLineOutputPrinterImp;
use PHPUnit\Framework\TestCase;
use Phaba\Migrations\Tests\TestHelper\AccessibilityTestHelper;

class CommandLineOutputFactoryTest extends TestCase
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

    public function testCanCreateCommandLineOutput(): void
    {
        $outputFactory = new CommandLineOutputFactory();
        $output = $outputFactory->createOutput();

        $this->assertInstanceOf(CommandLineOutputImp::class, $output);
    }

    public function testCanInjectPrinterWhenCreatingCommandLineOutput(): void
    {
        $outputFactory = new CommandLineOutputFactory();
        $output = $outputFactory->createOutput();

        $this->assertInstanceOf(
            CommandLineOutputPrinterImp::class,
            $this->accessibilityHelper->getNotAccessiblePropertyValue($output, 'printer')
        );
    }

    public function testCanCreateCommandLineOutputWithContent(): void
    {
        $outputFactory = new CommandLineOutputFactory();
        $output = $outputFactory->createOutputWithContent(array());

        $this->assertInstanceOf(CommandLineOutputImp::class, $output);
    }

    public function testCanInjectPrinterWhenCreatingCommandLineOutputWithContent(): void
    {
        $outputFactory = new CommandLineOutputFactory();
        $output = $outputFactory->createOutputWithContent(array());

        $this->assertInstanceOf(
            CommandLineOutputPrinterImp::class,
            $this->accessibilityHelper->getNotAccessiblePropertyValue($output, 'printer')
        );
    }
}
