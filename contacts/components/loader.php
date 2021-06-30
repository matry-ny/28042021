<?php

function load(string $url)
{
    session_start();

    $url = clearUrl($url);

    security($url);

    $parts = getUrlParts($url);

    require_once getControllerFile($parts);
    getActionFunction($parts)();
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

function getControllerFile(array &$parts): string
{
    $controllerName = array_shift($parts);
    $controllerName = camelize($controllerName);
    $controllerName = "{$controllerName}Controller.php";
    $controllerFile = config('controllersRout') . '/' . $controllerName;
    if (!file_exists($controllerFile)) {
        exit('Controller do not exists');
    }

    return $controllerFile;
}

function getActionFunction(array &$parts): string
{
    $actionName = array_shift($parts);
    $actionName = camelize($actionName);
    $actionFunction = "action{$actionName}";
    if (!function_exists($actionFunction)) {
        exit('Action do not exists');
    }

    return $actionFunction;
}