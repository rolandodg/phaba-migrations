<?php

declare(strict_types=1);

namespace Phaba\Migrations\Output;

use Phaba\Migrations\Core\Output\OutputPrinter;

class CommandLineOutputPrinterImp implements OutputPrinter
{
    public function print(array $content): void
    {
        foreach ($content as $line) {
            echo $line.'\n';
        }
    }
}
