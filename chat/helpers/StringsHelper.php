<?php

namespace helpers;

class StringsHelper
{
    public static function camelize(string $string, string $separator = '-'): string
    {
        $string = ucwords($string, $separator);
        return str_replace($separator, '', $string);
    }
}
