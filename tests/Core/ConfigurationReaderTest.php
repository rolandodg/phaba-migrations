<?php

declare(strict_types=1);

namespace Phaba\Migrations\Tests\Core;

use Phaba\Migrations\Core\ConfigurationReader;
use Phaba\Migrations\Core\Exception\InvalidElementException;
use Phaba\Migrations\Tests\TestHelper\AccessibilityTestHelper;
use Phaba\Migrations\Tests\TestHelper\ConfigurationTestHelper;
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
        $configHelper = new ConfigurationTestHelper();
        $configHelper->setTestConfigurationFilePath($this->config);

        $this->assertEquals('2ML2010', $this->config->getElement('common')['text']);
    }

    public function testCanGetTestConfiguration(): void
    {
        $configHelper = new ConfigurationTestHelper();
        $configHelper->setTestConfigurationFilePath($this->config);

        $this->assertEquals('2ML2010Test', $this->config->getElement('testing')['text']);
    }

    public function testThrowExceptionWhenElementDoesNotExist(): void
    {
        $configHelper = new ConfigurationTestHelper();
        $configHelper->setTestConfigurationFilePath($this->config);

        $this->expectException(InvalidElementException::class);
        $this->config->getElement('FakeElement');
    }
}
