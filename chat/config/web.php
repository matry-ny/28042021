<?php

$mainDir = dirname(__DIR__);

return [
    'controllersNamespace' => 'web\\controllers',
    'template' => [
        'viewsDir' => "{$mainDir}/web/views",
        'layoutsDir' => 'layouts',
        'defaultLayout' => 'main',
        'existedVariablePrefix' => 'skillup'
    ],
];
