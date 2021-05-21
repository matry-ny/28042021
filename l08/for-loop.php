<?php

$array = range(0, 10);

for ($i = 0; $i < 5; $i += 2) {
//    if ($i % 2 === 0) {
//        var_dump($i);
//    }
    var_dump($i);
}

$count = count($array);
for ($i = 0; $i < $count; $i++) {
    var_dump($array[$i]);
}

const START = 1;
const END = 10;
for ($col = START; $col <= END; $col++) {
    for ($row = START; $row <= END; $row++) {
        $result = $col * $row;
        echo "{$col} x {$row} = {$result}<br>";
    }
    echo '<br>';
}

$col = 1;
for ($row = 1; $row <= 10; $row++) {
    $result = $col * $row;
    echo "{$col} x {$row} = {$result}<br>";

    if ($row === 10) {
        $col++;
        $row = 0;
        echo '<br>';
    }

    if ($result === 100) {
        break;
    }
}