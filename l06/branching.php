<?php

$int = random_int(0, 5);
var_dump($int);

$isEven = ($int % 2 === 0);

if ($int === 0) {
    echo 'Number is zero';
} elseif ($int === 4 || $int === 5 || $int === 6) {
    echo 'Number is one of (4, 5, 6)';
} elseif ($isEven) {
    echo 'Number is even';
} else {
    echo 'Number is odd';
}

echo '<br>';

switch ($int) {
    case 0:
        echo 'Number is zero';
        break;
    case 4:
    case 5:
    case 6:
        echo 'Number is one of (4, 5, 6)';
        break;
    case $isEven:
        echo 'Number is even';
        break;
    default:
        echo 'Number is odd';
}

echo '<br>';

echo $isEven ? 'Number is even' : 'Number is odd';

echo '<br>';

$t = 2;
//echo empty($t) ? $t : 'is empty';
echo $t ?: 'is empty';

echo '<br>';

//$reeee = 33;
//echo isset($reeee) ? $reeee : 'not exists';
echo $reeee ?? 'not exists';
