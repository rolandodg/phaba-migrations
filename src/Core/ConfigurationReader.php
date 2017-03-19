<?php

declare(strict_types=1);

namespace Phaba\Migrations\Core;

use Phaba\Migrations\Core\Exception\InvalidElementException;
use Symfony\Component\Yaml\Yaml;

class ConfigurationReader
{
    /**
     * @var string
     */
    private $configPath;

    public function __construct()
    {
        $this->configPath = 'app/config';
    }

    public function getElement(string $name)
    {
        $commonConfig = Yaml::parse(file_get_contents($this->configPath.'/config.yaml'));
        $environmentConfig = Yaml::parse(file_get_contents($this->configPath.'/config_'.ENVIRONMENT.'.yaml'));
        $currentConfig = array_merge($commonConfig, $environmentConfig);

        if (!array_key_exists($name, $currentConfig)) {
            throw new InvalidElementException("Invalid $name Element in common configuration");
        }

        return $currentConfig[$name];
    }
}
