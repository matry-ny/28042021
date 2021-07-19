<?php

require_once __DIR__ . '/Autoloader.php';
spl_autoload_register([new Autoloader(__DIR__), 'load']);

$app = new App();
