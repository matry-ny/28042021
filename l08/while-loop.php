<?php

$file = fopen(__DIR__ . '/for-loop.php', 'rb');

while ($line = fgets($file)) {
    echo $line, '<br>';
}

fclose($file);


$data = [1, 2, 5, 7, 9];

do {
    $number = random_int(1, 10);
    var_dump($number);
} while (in_array($number, $data));
