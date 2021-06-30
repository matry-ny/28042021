<?php

function security(string $url)
{
    $isGuest = empty($_SESSION['user']);
    if ($isGuest && !in_array($url, config('guestActions'), true)) {
        redirect(config('loginUrl'));
    }
}
