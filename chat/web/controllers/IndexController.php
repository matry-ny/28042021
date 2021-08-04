<?php

namespace web\controllers;

use models\RoomEntity;
use web\components\AbstractWebController;

class IndexController extends AbstractWebController
{
    public function actionIndex()
    {
        $this->render('index/index', [
            'rooms' => RoomEntity::findAll('id', SORT_DESC)
        ]);
    }
}
