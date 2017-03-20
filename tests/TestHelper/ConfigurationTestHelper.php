<?php

declare(strict_types=1);

namespace Phaba\Migrations\Tests\TestHelper;

use Phaba\Migrations\Core\ConfigurationReader;
use Phaba\Migrations\Tests\TestHelper\AccessibilityTestHelper;

class ConfigurationTestHelper
{
    public function setTestConfigurationFilePath(ConfigurationReader $configReader): void
    {
        $accessHelper = new AccessibilityTestHelper();
        $accessHelper->setNotAccessiblePropertyValue($configReader, 'configPath', 'tests/app/config');
    }
}