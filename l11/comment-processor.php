<?php

$comment = serialize($_POST);

$dir = __DIR__ . '/storage/' . date('Y-m-d');
if (!is_dir($dir)) {
    mkdir($dir);
}

$file = time() . '_' . md5($comment) . '.log';
$rout = "{$dir}/{$file}";
if (file_exists($rout)) {
    header('Location: forms.php');
    exit;
}

file_put_contents($rout, $comment);
header('Location: forms.php');
