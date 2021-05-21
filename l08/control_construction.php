<?php

for ($i = 0; $i < 10; $i++) {
    if ($i === 3) {
//        exit('FINISH');
//        die('FINISH');
        continue;
//        break;
    }

    var_dump($i);
}

$letters = range('A', 'Z');
$numbers = range(1, 10);

foreach ($letters as $letter) {
    foreach ($numbers as $number) {
        if ($number === 2) {
            continue 2;
//            break 2;
        }

        var_dump("{$letter} > {$number}");
    }
}
