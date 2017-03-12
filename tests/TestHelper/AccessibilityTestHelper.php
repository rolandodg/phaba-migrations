<?php

declare(strict_types=1);

namespace Phaba\Migrations\Tests\TestHelper;

class AccessibilityTestHelper
{
    public function getNotAccessiblePropertyValue($object, string $name)
    {
        $reflectionObj = new \ReflectionObject($object);
        $property = $reflectionObj->getProperty($name);
        $property->setAccessible(true);

        return $property->getValue($object);
    }

    public function setNotAccessiblePropertyValue($object, string $property, $value): void
    {
        $reflectionObj = new \ReflectionClass($object);

        $property = $reflectionObj->getProperty($property);
        $property->setAccessible(true);
        $property->setValue($object, $value);
    }

    public function callNotAccessibleFunction($object, string $name, array $parameters)
    {
        $reflectionMethod = new \ReflectionMethod($object, $name);
        $reflectionMethod->setAccessible(true);
        return $reflectionMethod->invokeArgs($object, $parameters);
    }
}
