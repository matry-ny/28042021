<?php

namespace app\models;

use components\db\{Connect, Select};

class UserModel
{
    private Connect $connect;
    private Select $select;

    public function __construct()
    {
        $this->connect = new Connect();
        $this->select = new Select();
    }
}
