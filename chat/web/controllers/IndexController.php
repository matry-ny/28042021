<?php

namespace web\controllers;

use web\components\AbstractWebController;

class IndexController extends AbstractWebController
{
    public function actionIndex()
    {
        $this->render('index/index');
    }
}
