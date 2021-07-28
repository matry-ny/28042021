<?php

namespace helpers;

class RequestHelper
{
    public static function isPost(): bool
    {
        return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
    }
}
