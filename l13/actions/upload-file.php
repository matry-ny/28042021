<?php

require_once __DIR__ . '/../helpers/response.php';
require_once __DIR__ . '/../helpers/request.php';
require_once __DIR__ . '/../helpers/files.php';

$rout = getRout();
$redirectUrl = "../index.php?rout={$rout}";

$filesData = $_FILES['upload'] ?? [];
$filesData = reArrayFiles($filesData);

if (!$filesData) {
    error($redirectUrl, 'File is required');
}

if (count($filesData) > 5) {
    error($redirectUrl, 'You should upload less then 5 files');
}

$dir = dirname(__DIR__) . "/storage{$rout}";
if (is_file($dir)) {
    $dir = dirname($dir);
}

$uploaded = [];
foreach ($filesData as $fileData) {
    $target = "{$dir}/{$fileData['name']}";
    move_uploaded_file($fileData['tmp_name'], $target);
    $uploaded[] = $fileData['name'];
}

$uploadedString = implode(', ', $uploaded);
success($redirectUrl, "Files '{$uploadedString}' are uploaded");
