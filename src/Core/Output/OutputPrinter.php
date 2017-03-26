<?php

declare(strict_types=1);

namespace Phaba\Migrations\Core\Output;

interface OutputPrinter
{
    public function print(array $content): void;
}
