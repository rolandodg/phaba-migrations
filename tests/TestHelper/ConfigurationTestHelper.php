<?php

declare(strict_types=1);

namespace Phaba\Migrations\Tests\TestHelper;

use Phaba\Migrations\Core\ConfigurationReader;
use Symfony\Component\Yaml\Yaml;

class ConfigurationTestHelper
{
    const TEST_CONFIG_PATH = 'tests/app/config';

    public function getTestConfigurationReader(): ConfigurationReader
    {
        $accessHelper = new AccessibilityTestHelper();

        $config = new ConfigurationReader();
        $accessHelper->setNotAccessiblePropertyValue($config, 'currentConfig', $this->getTestConfigurationArray());

        return $config;
    }

    private function getTestConfigurationArray()
    {
        $commonConfig = Yaml::parse(file_get_contents(self::TEST_CONFIG_PATH.'/config.yaml'));
        $environmentConfig = Yaml::parse(file_get_contents(self::TEST_CONFIG_PATH.'/config_'.ENVIRONMENT.'.yaml'));

        return array_merge($commonConfig, $environmentConfig);
    }


}