<?php

require_once __DIR__ . '/../helpers/response.php';

$dirName = $_POST['dir_name'] ?? null;
if (!$dirName) {
    error('../index.php', 'Directory name is required');
}

$storage = __DIR__ . '/../storage/';
$rout = !empty($_GET['rout']) ? "{$_GET['rout']}/" : '';

$dir = "{$storage}{$rout}{$dirName}";

$rout = rtrim($rout, '/');

if (file_exists($dir)) {
    error("../index.php?rout={$rout}", "Directory '{$dirName}' is already exists");
}

mkdir($dir);

success("../index.php?rout={$rout}", "Directory '{$dirName}' created successfully");
