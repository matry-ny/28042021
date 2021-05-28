<?php

function getNumbers(int $min, int $max): Generator
{
    yield 1;
    yield 3;
    yield 5;
    yield 7;
    yield 8;

//    for (; $min <= $max; $min++) {
//        yield $min;
//    }
//    return range($min, $max);
}

$numbers = getNumbers(PHP_INT_MIN, PHP_INT_MAX);
foreach ($numbers as $number) {
    echo $number, ' ';
}
echo PHP_EOL;
