<?php

$file = __DIR__ . '/storage/' . $_GET['id'];
if (!file_exists($file)) {
    header('Location: error.php?message=Comment is not exists');
    exit;
}

unlink($file);

header('Location: forms.php');
