<?php

$string = "My test string ппп";
var_dump($string);

$int = 1;
$float = 1.0;

var_dump(false == null);
var_dump(false === null);
var_dump($int == $float);
var_dump($int === $float);
var_dump(PHP_INT_MIN, PHP_INT_MAX);

$array = [
    'Apple',
    'Grape',
    'Banana',
    'Orange',
    'Pear',
    1 + 2,
];
$arrayOld = array(
    'Apple',
    'Grape',
    'Banana',
    'Orange',
    'Pear',
);
var_dump($array, $arrayOld);

$object = new stdClass();
var_dump($object);

var_dump(__DIR__, __FILE__);
$resource = fopen(__DIR__ . '/concatenation.php', 'rb');
var_dump($resource);
fclose($resource);

var_dump(gettype($object));

$callback = function () {};
var_dump($callback);
