<?php

declare(strict_types=1);

namespace Phaba\Migrations\Input;


use Phaba\Migrations\Core\Input\Input;

class CommandLineInputImp implements Input
{
    private $args;

    public function __construct(array $argv = null)
    {
        if($argv === null){
            $argv = $_SERVER['argv'];
        }

        array_shift($argv);

        $this->args = $argv;

        if (!count($this->args)){
            $this->setDefaults();
        }
    }

    public function setDefaults()
    {
        $this->cliArguments[0] = 'help';
    }

    public function getFirstArgument()
    {
        return $this->args[0];
    }
}