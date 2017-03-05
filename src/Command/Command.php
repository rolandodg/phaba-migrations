<?php

declare(strict_types=1);


namespace Phaba\Migrations\Command;

interface Command
{
    public function execute(): void;
    public function validateArguments(): void;
}
