<?php

declare(strict_types=1);

namespace Phaba\Migrations\Tests\Factory\Output;

use Phaba\Migrations\Factory\Output\CommandLineOutputFactory;
use Phaba\Migrations\Output\CommandLineOutputImp;
use Phaba\Migrations\Output\CommandLineOutputPrinterImp;
use PHPUnit\Framework\TestCase;
use ReflectionObject;

class CommandLineOutputFactoryTest extends TestCase
{
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

        $this->assertInstanceOf(CommandLineOutputPrinterImp::class, $this->makePropertyAccessible($output, 'printer'));
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

        $this->assertInstanceOf(CommandLineOutputPrinterImp::class, $this->makePropertyAccessible($output, 'printer'));
    }

    private function makePropertyAccessible($object, string $name)
    {
        $reflectionObj = new ReflectionObject($object);
        $property = $reflectionObj->getProperty($name);
        $property->setAccessible(true);

        return $property->getValue($object);
    }
}
