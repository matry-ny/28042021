<?php

namespace components;

class DB
{
    private db\Connect $connect;

    public function __construct()
    {
        $this->connect = new db\Connect();
    }
}
