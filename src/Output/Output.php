<?php

declare(strict_types=1);

namespace Phaba\Migrations\Output;

interface Output
{
    public function process(): void;
}
