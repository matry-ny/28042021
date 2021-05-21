<?php

$a1 = [
    'name' => 'Dmytro',
    'lastName' => 'Dmytro',
    'age' => 32,
    'skills' => [
        'PHP',
        'JS'
    ],
];

foreach ($a1 as $key => $value) {
    if (is_array($value)) {
        $value = serialize($value);
    }
    echo "{$key}: {$value}<br>";
}

$data = [1, 2, 3, 4, 5];
foreach ($data as &$value) {
    $value += 2;
}
unset($value);
$value = 100;
var_dump($data);
