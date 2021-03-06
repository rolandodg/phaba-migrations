<?php

declare(strict_types=1);

namespace Phaba\Migrations\Output;

interface Output
{
    public function process(): void;
    public function getContent(): array;
    public function setContent(array $content): Output;
}
