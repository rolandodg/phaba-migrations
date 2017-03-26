<?php

declare(strict_types=1);

namespace Phaba\Migrations\Configuration;

use Phaba\Migrations\Core\Configuration\ConfigurationReader;
use Phaba\Migrations\Core\Exception\InvalidElementException;
use Symfony\Component\Yaml\Yaml;

class YamlConfigurationReaderImp implements ConfigurationReader
{
    /**
     * @var string
     */
    private $configPath;

    /**
     * @var array
     */
    private $currentConfig;

    public function __construct(string $configurationPath)
    {
        $this->configPath = $configurationPath;
        $this->currentConfig = $this->getCurrentConfigurationArray();
    }

    private function getCurrentConfigurationArray()
    {
        $commonConfig = Yaml::parse(file_get_contents($this->configPath.'/config.yaml'));
        $environmentConfig = Yaml::parse(file_get_contents($this->configPath.'/config_'.ENVIRONMENT.'.yaml'));

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
