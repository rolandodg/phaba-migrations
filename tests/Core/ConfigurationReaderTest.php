<?php

declare(strict_types=1);

namespace Phaba\Migrations\Tests\Core;

use Phaba\Migrations\Core\ConfigurationReader;
use Phaba\Migrations\Tests\TestHelper\ConfigurationTestHelper;
use Phaba\Migrations\Core\Exception\InvalidElementException;
use PHPUnit\Framework\TestCase;

class ConfigurationReaderTest extends TestCase
{
    /**
     * @var ConfigurationReader
     */
    private $configReader;

    public function setUp()
    {
        $configHelper = new ConfigurationTestHelper();
        $this->configReader = $configHelper->getTestConfigurationReader();
    }

    public function testCanGetCommonConfiguration(): void
    {
        $this->assertEquals('2ML2010', $this->configReader->getElement('common')['text']);
    }

    public function testCanGetTestConfiguration(): void
    {
        $this->assertEquals('2ML2010Test', $this->configReader->getElement('testing')['text']);
    }

    public function testThrowExceptionWhenElementDoesNotExist(): void
    {
        $this->expectException(InvalidElementException::class);
        $this->configReader->getElement('FakeElement');
    }
}
