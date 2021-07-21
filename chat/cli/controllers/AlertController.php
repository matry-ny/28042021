<?php

namespace cli\controllers;

use components\AbstractController;

class AlertController extends AbstractController
{
    public function actionRaw()
    {
        \App::get()->template()?->render('test');
    }
}
