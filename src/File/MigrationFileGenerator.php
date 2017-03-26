<?php

declare(strict_types=1);

namespace Phaba\Migrations\File;

use Phaba\Migrations\Core\Output\Output;
use Phaba\Migrations\Factory\Output\CommandLineOutputFactory;
use PHPUnit\Framework\Exception;

class MigrationFileGenerator
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var Output
     */
    private $output;

    public function __construct(string $path)
    {
        $this->path = $path;

        $outputFactory = new CommandLineOutputFactory();
        $this->output = $outputFactory->createOutput();
    }

    public function create(\DateTime $now): Output
    {
        try {
            $this->tryToCreate($now);
        } catch (Exception $e) {
            $this->output->setContent(array($e->getMessage()));
        }

        return $this->output;
    }

    private function tryToCreate(\DateTime $now): void
    {
        if (!file_exists($this->path)) {
            mkdir($this->path);
        }

        if (!file_exists($this->path.'/'.$this->generateFileName($now).'php')) {
            $file = fopen($this->path.'/'.$this->generateFileName($now).'php', 'wb');
            fclose($file);
            $this->output->setContent(array('Created file '.$this->generateFileName($now).".php in $this->path"));
        } else {
            $this->output->setContent(
                array(
                    'Cannot create migration file '.$this->generateFileName($now).
                        ".php. File already exists in $this->path"
                )
            );
        }
    }

    private function generateFileName(\DateTime $now): string
    {
        return $now->format('YmdHis');
    }
}
