<?php

namespace components;

class Config
{
    private array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->config[$key] ?? $default;
    }
}
