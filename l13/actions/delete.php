<?php

require_once __DIR__ . '/../security.php';

require_once __DIR__ . '/../helpers/request.php';
require_once __DIR__ . '/../helpers/response.php';
require_once __DIR__ . '/../helpers/files.php';

$rout = getRout();

$file = realpath(dirname(__DIR__) . '/storage' . $rout);
if (!file_exists($file)) {
    error("../index.php?rout={$rout}", 'File not exists');
}

$redirectTo = dirname($rout);

removeElement($file);

success("../index.php?rout={$redirectTo}", "Element '{$rout}' is deleted");
