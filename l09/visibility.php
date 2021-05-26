<?php

require_once __DIR__ . '/visibility2.php';

$g1 = 12;

function test()
{
//    global $g1, $v1;
//    var_dump($g1, $v1);
//    $g1 = 55;
//    unset($g1);

    var_dump($GLOBALS['g1'], $GLOBALS['v1']);
    $GLOBALS['g1'] = 55;
    unset($GLOBALS['g1']);
}

//test();
//test();

var_dump($g1);

$test = function () use ($g1, $v1) {
    var_dump($g1, $v1);
    $g1 = 44;
    unset($g1);
};

$test();
$test();
var_dump($g1);

function linked(&$p1)
{
    $p1 = 22;
    unset($p1);
}

$data = 123;
linked($data);
var_dump($data);
