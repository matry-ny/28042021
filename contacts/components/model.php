<?php

function model(string $model): void
{
    $dir = config('modelsDir');
    $file = "{$dir}/{$model}.php";
    if (!file_exists($file)) {
        exit("Model '{$model}' not exists");
    }

    require_once $file;
}
