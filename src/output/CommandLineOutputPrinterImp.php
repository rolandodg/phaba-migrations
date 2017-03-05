<?php

namespace Phaba\Migrations\Output;

class CommandLineOutputPrinterImp implements OutputPrinter
{
    public function print(array $content): void
    {
        foreach ($content as $line){
            echo $line.'\n';
        }
    }
}