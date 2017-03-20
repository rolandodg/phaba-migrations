<?php

declare(strict_types=1);

namespace Phaba\Migrations\Core;

use Phaba\Migrations\Core\Exception\InvalidElementException;
use Symfony\Component\Yaml\Yaml;

class ConfigurationReader
{
    const CONFIG_PATH = 'app/config';

    /**
     * @var array
     */
    private $currentConfig;

    public function __construct()
    {
        $this->currentConfig = $this->getCurrentConfigurationArray();
    }

    private function getCurrentConfigurationArray()
    {
        $commonConfig = Yaml::parse(file_get_contents(self::CONFIG_PATH.'/config.yaml'));
        $environmentConfig = Yaml::parse(file_get_contents(self::CONFIG_PATH.'/config_'.ENVIRONMENT.'.yaml'));

        return array_merge($commonConfig, $environmentConfig);
    }

    public function getElement(string $name)
    {
        if (!array_key_exists($name, $this->currentConfig)) {
            throw new InvalidElementException("Invalid $name Element in common configuration");
        }

        return $this->currentConfig[$name];
    }
}
