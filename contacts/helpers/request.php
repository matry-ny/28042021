<?php

function isPostRequest(): bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
}
