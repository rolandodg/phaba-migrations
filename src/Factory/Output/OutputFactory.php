<?php

declare(strict_types=1);

namespace Phaba\Migrations\Factory\Output;


use Phaba\Migrations\Core\Output\Output;

abstract class OutputFactory
{
    abstract public function createOutput(): Output;
    abstract public function createOutputWithContent(array $content): Output;
}
