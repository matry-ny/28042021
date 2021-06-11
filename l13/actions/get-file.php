<?php

require_once __DIR__ . '/../helpers/request.php';
require_once __DIR__ . '/../helpers/response.php';

$rout = getRout();

$file = realpath(dirname(__DIR__) . '/storage' . $rout);
if (!file_exists($file)) {
    error("../index.php?rout={$rout}", 'File not exists');
}

header('Content-Type: ' . mime_content_type($file));
echo file_get_contents($file);
