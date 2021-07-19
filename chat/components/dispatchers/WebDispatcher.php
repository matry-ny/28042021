<?php

namespace components\dispatchers;

class WebDispatcher extends AbstractDispatcher
{
    protected function dispatch(): void
    {
        $url = $this->clearUrl($_SERVER['REQUEST_URI']);
        $parts = $this->getUrlParts($url);
        $this->setParts($parts);
    }

    private function clearUrl(string $url): string
    {
        $url = ltrim($url, '/');
        return preg_replace('/\\?.*/', '', $url);
    }

    private function getUrlParts(string $url): array
    {
        $parts = explode('/', $url);
        return array_filter($parts);
    }
}