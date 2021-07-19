<?php

class Autoloader
{
    private string $dir;

    public function __construct(string $dir)
    {
        $this->dir = $dir;
    }

    public function load(string $class): void
    {
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        $file = "{$this->dir}/{$class}.php";

        if (file_exists($file)) {
            require_once $file;
        }
    }
}
