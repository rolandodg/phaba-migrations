<?php

declare(strict_types=1);

namespace Phaba\Migrations\Tests\Factory\Output;



use Phaba\Migrations\Factory\Output\CommandLineOutputFactory;
use Phaba\Migrations\Factory\Output\OutputFactory;
use Phaba\Migrations\Output\CommandLineOutputImp;
use PHPUnit\Framework\TestCase;

class CommandLineOutputFactoryTest extends TestCase
{
    public function testCanCreateCommandLineOutput()
    {
        $outputFactory = $this->createOutputFactory();
        $output = $outputFactory->createOutput();
        $this->assertInstanceOf(CommandLineOutputImp::class, $output);
    }

    public function createOutputFactory(): OutputFactory
    {
        return new CommandLineOutputFactory();
    }
}