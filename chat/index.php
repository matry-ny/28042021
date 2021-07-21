<?php

require_once __DIR__ . '/Autoloader.php';
spl_autoload_register([new Autoloader(__DIR__), 'load']);

$config = array_merge(
    require __DIR__ . '/config/general.php',
    require __DIR__ . '/config/web.php',
);

$app = App::run($config);
