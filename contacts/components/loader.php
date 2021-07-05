<?php

function load(string $url)
{
    session_start();

    $url = clearUrl($url);

    security($url);

    $parts = getUrlParts($url);

    $controllerName = array_shift($parts) ?: config('defaultController');
    require_once getControllerFile($controllerName);

    $actionName = array_shift($parts) ?: config('defaultAction');
    getActionFunction($actionName)();
}

function getUrlParts(string $url): array
{
    $parts = explode('/', $url);
    return array_filter($parts);
}

function clearUrl(string $url): string
{
    return preg_replace('/\\?.*/', '', $url);
}

function getControllerFile(string $controllerName): string
{
    $controllerName = camelize($controllerName);
    $controllerName = "{$controllerName}Controller.php";
    $controllerFile = config('controllersRout') . '/' . $controllerName;
    if (!file_exists($controllerFile)) {
        exit('Controller do not exists');
    }

    return $controllerFile;
}

function getActionFunction(string $actionName): string
{
    $actionName = camelize($actionName);
    $actionFunction = "action{$actionName}";
    if (!function_exists($actionFunction)) {
        exit('Action do not exists');
    }

    return $actionFunction;
}