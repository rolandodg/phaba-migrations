<?php

declare(strict_types=1);

namespace Phaba\Migrations\Tests\Core;

use Phaba\Migrations\Core\ConfigurationReader;
use Phaba\Migrations\Core\Exception\InvalidElementException;
use Phaba\Migrations\Tests\TestHelper\AccessibilityTestHelper;
use PHPUnit\Framework\TestCase;

class ConfigurationReaderTest extends TestCase
{
    /**
     * @var ConfigurationReader
     */
    private $config;

    public function setUp()
    {
        parent::setUp();
        $this->config = new ConfigurationReader();
    }

    public function testHasRightConfigurationFilesPath(): void
    {
        $accessHelper = new AccessibilityTestHelper();

        $this->assertEquals('app/config', $accessHelper->getNotAccessiblePropertyValue($this->config, 'configPath'));
    }

    public function testCanGetCommonConfiguration(): void
    {
        $this->setTestConfigurationFilePath();
        $this->assertEquals('2ML2010', $this->config->getElement('common')['text']);
    }

    public function testCanGetTestConfiguration(): void
    {
        $this->setTestConfigurationFilePath();
        $this->assertEquals('2ML2010Test', $this->config->getElement('testing')['text']);
    }

    public function testThrowExceptionWhenElementDoesNotExist(): void
    {
        $this->setTestConfigurationFilePath();

        $this->expectException(InvalidElementException::class);
        $this->config->getElement('FakeElement');
    }

    public function setTestConfigurationFilePath(): void
    {
        $accessHelper = new AccessibilityTestHelper();
        $accessHelper->setNotAccessiblePropertyValue($this->config, 'configPath', 'tests/app/config');
    }
}
