<?php

function config(string $key, mixed $default = null): mixed
{
    $dir = dirname(__DIR__);
    $config = [
        'controllersRout' => "{$dir}/controllers",
        'viewsRout' => "{$dir}/views",
        'layoutsRout' => "{$dir}/views/layouts",
        'existedVariablePrefix' => 'skillup',
        'defaultController' => 'index',
        'defaultAction' => 'index',
        'loginUrl' => '/guest/login',
        'modelsDir' => "{$dir}/models",
        'guestActions' => [
            '/guest/login',
            '/guest/registration',
        ],
        'db' => [
            'host' => 'db',
            'user' => 'skillup_user',
            'password' => 'skillup_pwd',
            'db_name' => 'skillup_db',
        ],
        'recordsOnPage' => 50
    ];

    return $config[$key] ?? $default;
}
