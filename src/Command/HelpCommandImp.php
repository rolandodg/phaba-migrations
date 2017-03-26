<?php

namespace Phaba\Migrations\Command;

use Phaba\Migrations\Command\Command;
use Phaba\Migrations\Input\CommandLineArguments;
use InvalidArgumentException;
use Phaba\Migrations\Core\Output\Output;

class HelpCommandImp implements Command
{
    private $argv;

    public function __construct(CommandLineArguments $argv)
    {
        $this->argv = $argv;
    }

    public function execute(): Output
    {
        $this->validateArguments();
    }

    public function validateArguments(): void
    {
        if (count($this->argv) > 1) {
            throw new InvalidArgumentException(sprintf('Invalid parameter %s', $this->argv[1]));
        }
    }
}
