<?php

while (true) {
    $number = (int)readline('Enter your number: ');

    $realNumber = random_int(1, 10);
    echo $realNumber === $number ? 'You WIN!' : 'You LOSE!';
    echo PHP_EOL;

    $continue = strtolower(readline('Play again? (Y/n): '));
    if ($continue === 'n') {
        break;
    }
}
