<?php

declare(strict_types=1);

namespace Phaba\Migrations\Output;

use Phaba\Migrations\Core\Output\Output;

class CommandLineOutputImp implements Output
{
    /**
     * @var array
     */
    private $content;

    /**
     * @var CommandLineOutputPrinterImp
     */
    private $printer;

    public function __construct(CommandLineOutputPrinterImp $printer)
    {
        $this->printer = $printer;
    }

    public function process(): void
    {
        $this->printer->print($this->content);
    }

    public function setContent(array $content): Output
    {
        $this->content = $content;
        return $this;
    }

    public function getContent(): array
    {
        return $this->content;
    }
}
