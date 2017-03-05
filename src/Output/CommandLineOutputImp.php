<?php

declare(strict_types=1);

namespace Phaba\Migrations\Output;

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

    public function setContent(array $content): CommandLineOutputImp
    {
        $this->content = $content;
        return $this;
    }

    public function process(): void
    {
        $this->printer->print($this->content);
    }
}
