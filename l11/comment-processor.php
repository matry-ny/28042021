<?php

$comment = serialize($_POST);

$error = wordsFilter($_POST['comment']);
if ($error) {
    header("Location: error.php?message={$error}");
    exit;
}

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

function wordsFilter(string $message): ?string
{
    $blackList = [
        'jepa',
        'nigga',
        'loh'
    ];

    $errors = [];
    foreach ($blackList as $word) {
        $contains = stripos($message, $word);
        if ($contains !== false) {
            $errors[] = $word;
        }
    }

    if ($errors) {
        $words = implode(', ', $errors);
        if (count($errors) > 1 ) {
            $prefix = 'Words';
            $suffix = 'are';
        } else {
            $prefix = 'Word';
            $suffix = 'is';
        }

        return "{$prefix} '{$words}' {$suffix} not accepted";
    }

    return null;
}

