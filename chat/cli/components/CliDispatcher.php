<?php

namespace cli\components;

use components\AbstractDispatcher;

class CliDispatcher extends AbstractDispatcher
{
    protected function dispatch(): void
    {
        global $argv;

        $command = $argv[1] ?? '';
        $parts = explode('/', $command);
        $this->setParts($parts);
    }
}