<?php

declare(strict_types=1);

namespace Phaba\Migrations\Factory\Output;

use Phaba\Migrations\Output\CommandLineOutputImp;
use Phaba\Migrations\Output\CommandLineOutputPrinterImp;
use Phaba\Migrations\Output\Output;

abstract class OutputFactory
{
    abstract public function createOutput(): Output;
}