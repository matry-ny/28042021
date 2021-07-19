<?php

namespace components\db;

class Select
{
    private Connect $connect;

    public function __construct()
    {
        $this->connect = new Connect();
    }
}