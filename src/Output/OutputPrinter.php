<?php

declare(strict_types=1);

namespace Phaba\Migrations\Output;

interface OutputPrinter
{
    public function print(array $content): void;
}