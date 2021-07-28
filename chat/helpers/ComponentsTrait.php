<?php

namespace helpers;

use App;
use components\Config;
use components\DB;
use components\Session;
use components\Template;

trait ComponentsTrait
{
    public function template(): Template
    {
        return App::get()->template();
    }

    public function config(): Config
    {
        return App::get()->config();
    }

    public function DB(): DB
    {
        return App::get()->db();
    }

    public function session(): Session
    {
        return App::get()->session();
    }
}
