<?php


namespace Phaba\Migrations\Command;


interface Command
{
    public function execute();
    public function validateArguments();
    public function tryToValidateArguments();
}