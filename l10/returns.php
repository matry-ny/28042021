<?php

function getNumbers(int $min, int $max, bool $evensOnly = false): array
{
    $numbers = range($min, $max);
    if ($evensOnly) {
        $numbers = array_filter($numbers, fn ($number) => $number % 2 === 0);
//        $numbers = array_filter($numbers, function ($number) {
//            return $number % 2 === 0;
//        });
    }

    return $numbers;
}

$numbers = getNumbers(5, 19);
var_dump($numbers);

$evens = getNumbers(5, 19, true);
var_dump($evens);



