<?php

function getFilesList(): array
{
    $rout = getRout();

    $storage = __DIR__ . '/storage';
    $dir = realpath("{$storage}/{$rout}");
    if (is_file($dir)) {
        $dir = dirname($dir);
    }

    $files = scandir($dir);

    $disabledDirs = ['.', '.gitignore'];
    if (realpath($storage) === $dir) {
        $disabledDirs[] = '..';
    }

    $files = array_filter(
        $files,
        static fn ($file) => !in_array($file, $disabledDirs)
    );

    usort($files, 'sortFileType');

    return $files;
}

function renderFile(): string
{
    $rout = getRout();

    $storage = __DIR__ . '/storage';
    $file = realpath("{$storage}/{$rout}");
    if (!is_file($file)) {
        return '';
    }

    $type = mime_content_type($file);
    switch ($type) {
        case 'image/jpeg':
            return renderImage($rout);
        case 'application/vnd.openxmlformats-officedocument.wordprocessingml.documentapplication/vnd.openxmlformats-officedocument.wordprocessingml.document':
            return '<img src="public/word.png" alt="Word" width="100px">';
        default:
            return 'File type is not supported';
    }
}

function renderImage(string $rout): string
{
    return "<img src='actions/get-file.php?rout={$rout}' alt='{$rout}' width='100%'>";
}
