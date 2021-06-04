<?php

$file = __DIR__ . '/storage/' . $_GET['id'];
if (!file_exists($file)) {
    header('Location: error.php?message=Comment is not exists');
    exit;
}

$data = $_POST;
$data['updatedAt'] = time();
$comment = serialize($data);
file_put_contents($file, $comment);

header('Location: forms.php');
