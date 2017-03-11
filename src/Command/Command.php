<?php

declare(strict_types=1);


namespace Phaba\Migrations\Command;

use Phaba\Migrations\Output\Output;

interface Command
{
    public function execute(): Output;
    public function validateArguments(): void;
}
