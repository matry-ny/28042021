<?php

function sortFileType($a, $b): int
{
    if (is_dir($a)) {
        return is_dir($b) ? strnatcasecmp($a, $b) : -1;
    }

    if (is_dir($b)) {
        return 1;
    }

    $aExt = pathinfo($a, PATHINFO_EXTENSION);
    $bExt = pathinfo($b, PATHINFO_EXTENSION);

    if ($aExt === $bExt) {
        return strnatcasecmp($a, $b);
    }

    return strcasecmp($aExt, $bExt);
}

function reArrayFiles(array $files): array
{
    $fileArray = [];
    $filesCount = count($files['name']);
    $fileKeys = array_keys($files);

    for ($i = 0; $i < $filesCount; $i++) {
        foreach ($fileKeys as $key) {
            $fileArray[$i][$key] = $files[$key][$i];
        }
    }

    return $fileArray;
}

function isFile(string $rout): bool
{
    $file = dirname(__DIR__) . '/storage' . $rout;
    return is_file($file);
}

function removeElement(string $rout): void
{
    if (is_file($rout)) {
        unlink($rout);
        return;
    }

    $items = scandir($rout);
    $items = array_filter($items, static fn (string $item) => !in_array($item, ['.', '..']));

    foreach ($items as $item) {
        $path = "{$rout}/{$item}";
        removeElement($path);
    }

    rmdir($rout);
}
