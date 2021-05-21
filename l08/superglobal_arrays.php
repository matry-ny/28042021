<?php

$qqqq = 123;

var_dump($_SERVER);

var_dump($_ENV);
var_dump(getenv('TEST'));

$GLOBALS['qqqq'] = 555;
var_dump($GLOBALS);

var_dump($qqqq);
