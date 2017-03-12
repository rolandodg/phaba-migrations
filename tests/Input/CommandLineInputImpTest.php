<?php

declare(strict_types=1);

namespace Phaba\Migrations\Tests\Input;

use Phaba\Migrations\Input\CommandLineInputImp;
use PHPUnit\Framework\TestCase;

class CommandLineInputImpTest extends TestCase
{
    private function setGlobalServerArguments(
        string $scriptName = 'phaba-migration',
        string $command = null,
        array $arguments = []
    ): void {
        $_SERVER['argv'] = array($scriptName);
        if ($command !== null) {
            $_SERVER['argv'][] = $command;
        }
        foreach ($arguments as $argument) {
            $_SERVER['argv'][] = $argument;
        }
    }


    public function testCanBeCreatedWithDefaultValues(): void
    {
        $this->setGlobalServerArguments();

        $commandLineInput = new CommandLineInputImp();

        $this->assertEquals('help', $commandLineInput->getFirstArgument());
    }

    public function testCanBeCreatedWithoutArguments(): void
    {
        $this->setGlobalServerArguments('phaba-migration', 'createTMNT', array('-m', '--michelangelo'));
        $commandLineInput = new CommandLineInputImp();

        $this->assertEquals('createTMNT', $commandLineInput->getFirstArgument());
    }

    public function testCanBeCreatedWithArguments(): void
    {
        $commandLineInput = new CommandLineInputImp(array('phaba-migration','createTMNT', '-m', '--michelangelo'));

        $this->assertEquals('createTMNT', $commandLineInput->getFirstArgument());
    }

    public function testCanGetFirstArgument(): void
    {
        $firstArgument = 'createTMNT';
        $commandLineInput = new CommandLineInputImp(array('phaba-migration', $firstArgument, '-d'));
        $this->assertEquals($firstArgument, $commandLineInput->getFirstArgument());
    }
}
