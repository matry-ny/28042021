<?php

require __DIR__ . '/functions_2.php';

hello();

function hello()
{
    echo 'Hello my friend!<br>';
    echo __FUNCTION__, '<br>';

    handshake();
}

hello();
hello();
hello();

$elements = scandir(__DIR__);
$filtered = array_filter($elements, function ($item) {
    return !in_array($item, ['.', '..']);
});
var_dump($filtered);

$test = function () {
    $qq = 1;
    echo 'TEST', '<br>';
};

$test();
call_user_func($test);
call_user_func('hello');
