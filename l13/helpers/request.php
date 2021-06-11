<?php

function getRout(): string
{
    $rout = $_GET['rout'] ?? '';

    $storage = dirname(__DIR__) . '/storage';
    $dir = realpath("{$storage}/{$rout}");

    if (!str_contains($dir, $storage)) {
        $dir = "{$storage}/";
    }

    return str_replace($storage, '', $dir);
}
