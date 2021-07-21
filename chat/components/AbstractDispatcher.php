<?php

namespace components;

abstract class AbstractDispatcher
{
    private const DEFAULT_PART = 'index';

    private array $parts = [];

    public function __construct()
    {
        $this->dispatch();
    }

    public function getControllerPart(): string
    {
        return $this->parts[0] ?? self::DEFAULT_PART;
    }

    public function getActionPart(): string
    {
        return $this->parts[1] ?? self::DEFAULT_PART;
    }

    protected function setParts(array $parts): void
    {
        $this->parts = $parts;
    }

    abstract protected function dispatch(): void;
}
