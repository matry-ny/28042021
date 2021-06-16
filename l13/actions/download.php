<?php

require_once __DIR__ . '/../helpers/request.php';
require_once __DIR__ . '/../helpers/response.php';

$rout = getRout();

$file = realpath(dirname(__DIR__) . '/storage' . $rout);
if (!file_exists($file)) {
    error("../index.php?rout={$rout}", 'File not exists');
}

if (!is_file($file)) {
    error("../index.php?rout={$rout}", 'File is not a file');
}

header('Content-Description: File Transfer');
header('Content-Type: ' . mime_content_type($file));
header('Cache-Control: no-cache, must-revalidate');
header('Expires: 0');
header(
    sprintf('Content-Disposition: attachment; filename="%s"', basename($file))
);
header('Content-Length: ' . filesize($file));
header('Pragma: public');

echo file_get_contents($file);
