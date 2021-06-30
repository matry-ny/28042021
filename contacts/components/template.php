<?php

function render(string $template, array $variables = [], string $layout = 'main')
{
    extract($variables,  EXTR_PREFIX_SAME, config('existedVariablePrefix'));

    $file = config('viewsRout') . '/' . $template . '.php';
    if (!file_exists($file)) {
        exit('Template do not exists');
    }

    ob_start();
    require $file;
    $content = ob_get_clean();

    $layout = config('layoutsRout') . '/' . $layout . '.php';
    if (!file_exists($layout)) {
        exit('Layout do not exists');
    }

    require $layout;
}
