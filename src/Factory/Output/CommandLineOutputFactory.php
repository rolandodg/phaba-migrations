<?php

declare(strict_types=1);

namespace Phaba\Migrations\Factory\Output;

use Phaba\Migrations\Core\Output\Output;
use Phaba\Migrations\Output\CommandLineOutputImp;
use Phaba\Migrations\Output\CommandLineOutputPrinterImp;

class CommandLineOutputFactory extends OutputFactory
{
    public function createOutput(): Output
    {
        $printer = new CommandLineOutputPrinterImp();
        return new CommandLineOutputImp($printer);
    }

    public function createOutputWithContent(array $content): Output
    {
        $printer = new CommandLineOutputPrinterImp();
        $command = new CommandLineOutputImp($printer);
        $command->setContent($content);

        return $command;
    }
}
