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

$serialized = serialize($a1);
var_dump($serialized);

$s1 = 'a:3:{s:4:"name";s:6:"Dmytro";s:3:"age";i:32;s:6:"skills";a:2:{i:0;s:3:"PHP";i:1;s:2:"JS";}}';
$deserialized = unserialize($s1);
var_dump($deserialized);

$count = count($a1);
$countRecursive = count($a1, COUNT_RECURSIVE);
var_dump($count, $countRecursive);

//var_dump(array_shift($a1), $a1);
//var_dump(array_shift($a1), $a1);
//var_dump(array_shift($a1), $a1);

var_dump(array_key_exists('age', $a1), array_key_exists('test', $a1));

var_dump(in_array('Dmytro', $a1), in_array(33, $a1), in_array('32', $a1, true));

$a2 = [
    1, 2, 4, 2, 5, 4
];
$unique = array_unique($a2);
var_dump($unique);
