<?php

namespace web\controllers;

use App;
use components\AbstractController;

class UsersController extends AbstractController
{
    public function actionList()
    {
        $t = App::get()->template()?->render('users/list');
        echo($t);
    }
}
