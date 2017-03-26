<?php

declare(strict_types=1);

namespace Phaba\Migrations\Tests\File;

use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use Phaba\Migrations\File\MigrationFileGenerator;
use PHPUnit\Framework\TestCase;

class MigrationFileGeneratorTest extends TestCase
{
    const DATE_FORMAT = 'YmdHis';

    /**
     * @var string
     */
    public $rootPath;

    /**
     * @var string
     */
    public $migrationsDir;

    /**
     * @var vfsStreamDirectory
     */
    public $virtualRoot;

    /**
     * @var MigrationFileGenerator
     */
    public $fileGenerator;

    public function setUp()
    {
        $this->rootPath = 'tests';
        $this->migrationsDir = 'FakeMigrationsVersions';
        $this->virtualRoot = vfsStream::setup($this->rootPath);
        $this->fileGenerator = new MigrationFileGenerator(vfsStream::url($this->rootPath.'/'.$this->migrationsDir));
    }

    public function testCanCreateFileWhenDirectoryDoesNotExist(): void
    {
        $this->assertFalse($this->virtualRoot->hasChild($this->migrationsDir));

        $now = new \DateTime();
        $this->fileGenerator->create($now);

        $this->assertTrue(
            $this->virtualRoot->hasChild($this->migrationsDir.'/'.$now->format(self::DATE_FORMAT).'php')
        );
    }

    public function testCanCreateFileWhenDirectoryExists(): void
    {
        $now = new \DateTime();
        $this->fileGenerator->create($now);

        $this->assertTrue($this->virtualRoot->hasChild($this->migrationsDir.'/'.$now->format(self::DATE_FORMAT).'php'));
    }

    public function testCanReturnRightOutputWhenFileIsCreated(): void
    {
        $now = new \DateTime();
        $output = $this->fileGenerator->create($now);

        $this->assertEquals(
            'Created file '.$now->format(self::DATE_FORMAT).'.php in '.
                vfsStream::url($this->rootPath.'/'.$this->migrationsDir),
            implode("", $output->getContent())
        );
    }

    public function testCanReturnRightOutputWhenErrorCreatingFile(): void
    {
        $now = new \DateTime();
        $existingFile = vfsStream::setup(
            $this->rootPath.'/'.$this->migrationsDir.'/'.$now->format(self::DATE_FORMAT).'php'
        );

        $output = $this->fileGenerator->create($now);

        $this->assertEquals(
            "Cannot create migration file ".$now->format(self::DATE_FORMAT).".php. File already exists in ".
                vfsStream::url($this->rootPath.'/'.$this->migrationsDir),
            implode("", $output->getContent())
        );
    }
}
