<?php

namespace Phaba\Migrations\Output;

interface OutputPrinter
{
    public function print(array $content): void;
}