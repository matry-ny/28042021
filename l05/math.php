<?php

$a = 2;
$b = 3;
var_dump($a + 1 - 1 * $a / $b);

echo '<hr>';

$number = 10;
$number = $number + 1;
$number += 1;
$number++;
var_dump($number);

$n1 = 2;
$n2 = 3;
$n3 = 4;

//$n3 = $n3 + $n2;
$n3 += $n2;
var_dump($n3);

//$n3 = $n3 * $n2;
$n3 *= $n2;
var_dump($n3);

//$n3 = $n3 / $n2;
$n3 /= $n2;
var_dump($n3);

$t = -55;
$t2 = -$t;
var_dump($t2);


$int = 10;
//var_dump(++$int);
//var_dump($int);
//exit;
$int2 = $int++ + ++$int;
var_dump($int2);
