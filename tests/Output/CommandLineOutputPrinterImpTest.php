<?php

declare(strict_types=1);

namespace Phaba\Migrations\Tests\Output;

use PHPUnit\Framework\TestCase;
use Phaba\Migrations\Output\CommandLineOutputPrinterImp;

class CommandLineOutputPrinterImpTest extends TestCase
{
    public function outputProvider()
    {
        return [
            [
                [
                    'OK: Raphael is creating a new weapon',
                    'OK: Leonardo is training',
                    'OK: Donatello is thinking on April',
                    'OK: Michelangelo is eating pizza'
                ]
            ],
            [
                [1,2,3,4]
            ],
            [
                [1.2,3.4,4.5,6.7]
            ]
        ];
    }

    /**
     * @dataProvider outputProvider
     */
    public function testCanPrintString($output): void
    {
        $outputPrinter = new CommandLineOutputPrinterImp();
        $this->expectOutputString(implode('\n', $output).'\n');
        $outputPrinter->print($output);
    }
}