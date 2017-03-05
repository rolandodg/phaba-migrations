<?php

declare(strict_types=1);

namespace Phaba\Migrations\Factory\Output;

use Phaba\Migrations\Output\CommandLineOutputImp;
use Phaba\Migrations\Output\CommandLineOutputPrinterImp;
use Phaba\Migrations\Output\Output;

abstract class OutputFactory
{
    public function createOutput(string $type): Output
    {
        switch ($type){
            case Output::TYPE_COMMANDLINE:
                $printer = new CommandLineOutputPrinterImp();
                return new CommandLineOutputImp($printer);
                break;
        }
    }
}