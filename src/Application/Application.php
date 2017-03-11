<?php

namespace Phaba\Migrations\Application;

use Phaba\Migrations\Input\CommandLineArguments;

class Application
{
    public function run(CommandLineArguments $arguments): void
    {
        $commandClass = ucfirst($arguments->getFirstArguments()).'CommandImp';
        $command = new $commandClass();
        $command->execute();
    }
}
