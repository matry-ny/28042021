<?php

use components\dispatchers\AbstractDispatcher;
use components\dispatchers\CliDispatcher;
use components\dispatchers\WebDispatcher;

class App
{
    public function __construct()
    {
        $dispatcher = $this->getDispatcher();
        new \components\Router($dispatcher);
    }

    private function getDispatcher(): AbstractDispatcher
    {
        if (strtolower(PHP_SAPI) === 'cli') {
            return new CliDispatcher();
        }

        return new WebDispatcher();
    }
}
