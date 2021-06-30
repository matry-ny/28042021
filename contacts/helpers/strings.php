<?php

function camelize(string $string, $separator = '-'): string
{
    $string = ucwords($string, $separator);
    return str_replace($separator, '', $string);
}
