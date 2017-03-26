<?php

declare(strict_types=1);

namespace Phaba\Migrations\Command;

use Phaba\Migrations\Core\Output\Output;

interface Command
{
    public function execute(): Output;
    public function validateArguments(): void;
}
