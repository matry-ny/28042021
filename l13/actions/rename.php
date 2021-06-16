<?php

require_once __DIR__ . '/../helpers/request.php';
require_once __DIR__ . '/../helpers/response.php';
require_once __DIR__ . '/../helpers/files.php';

$rout = getRout();

$file = realpath(dirname(__DIR__) . '/storage' . $rout);
if (!file_exists($file)) {
    error("../index.php?rout={$rout}", 'File not exists');
}

$newName = dirname($file) . '/' . $_POST['new_name'];
rename($file, $newName);

$redirect = dirname($rout);

$message = "Renamed from '{$_POST['old_name']}' to '{$_POST['new_name']}'";
echo "index.php?rout={$redirect}&success_message={$message}";
