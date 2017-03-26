<?php

declare(strict_types=1);

namespace Phaba\Migrations\Tests\Input;

use Phaba\Migrations\Input\CommandLineInputImp;
use PHPUnit\Framework\TestCase;
use Phaba\Migrations\Tests\TestHelper\AccessibilityTestHelper;

class CommandLineInputImpTest extends TestCase
{
    /**
     * @var AccessibilityTestHelper
     */
    private $accessibilityHelper;

    public function setUp()
    {
        parent::setUp();

        $this->accessibilityHelper = new AccessibilityTestHelper();
    }

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

        $this->assertEquals(
            'help',
            $this->accessibilityHelper->getNotAccessiblePropertyValue($commandLineInput, 'args')[0]
        );
    }

    public function testCanBeCreatedWithoutArguments(): void
    {
        $this->setGlobalServerArguments('phaba-migration', 'createTMNT', array('-m', '--michelangelo'));
        $commandLineInput = new CommandLineInputImp();

        $this->assertEquals(
            'createTMNT',
            $this->accessibilityHelper->getNotAccessiblePropertyValue($commandLineInput, 'args')[0]
        );
    }

    public function testCanBeCreatedWithArguments(): void
    {
        $commandLineInput = new CommandLineInputImp(array('phaba-migration','createTMNT', '-m', '--michelangelo'));

        $this->assertEquals(
            'createTMNT',
            $this->accessibilityHelper->getNotAccessiblePropertyValue($commandLineInput, 'args')[0]
        );
    }

    public function testCanGetFirstArgument(): void
    {
        $firstArgument = 'createTMNT';
        $commandLineInput = new CommandLineInputImp(array('phaba-migration', $firstArgument, '-d'));
        $this->assertEquals(
            $firstArgument,
            $this->accessibilityHelper->getNotAccessiblePropertyValue($commandLineInput, 'args')[0]
        );
    }
}
