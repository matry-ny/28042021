<?php

namespace traits;

trait GoogleTrait
{
    use BingTrait;

    private function sendData(array $data)
    {
        var_dump('GOOOOGLE', $data);
    }
}
