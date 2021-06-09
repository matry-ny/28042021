<?php

function getFilesList(): array
{
    $rout = getRout();

    $storage = __DIR__ . '/storage';
    $dir = realpath("{$storage}/{$rout}");

    $files = scandir($dir);

    $disabledDirs = ['.'];
    if (realpath($storage) === $dir) {
        $disabledDirs[] = '..';
    }

    return array_filter(
        $files,
        static fn ($file) => !in_array($file, $disabledDirs)
    );
}
