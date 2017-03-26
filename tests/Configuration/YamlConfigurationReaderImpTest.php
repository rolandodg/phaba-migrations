<?php

declare(strict_types=1);

namespace Phaba\Migrations\Tests\Core;

use Phaba\Migrations\Configuration\YamlConfigurationReaderImp;
use Phaba\Migrations\Core\Exception\InvalidElementException;
use PHPUnit\Framework\TestCase;

class YamlConfigurationReaderImpTest extends TestCase
{
    /**
     * @var YamlConfigurationReaderImp
     */
    private $configReader;

    public function setUp()
    {
        $this->configReader = new YamlConfigurationReaderImp('tests/app/config');
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
