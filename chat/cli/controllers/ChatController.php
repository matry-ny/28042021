<?php

namespace cli\controllers;

use cli\components\WebSocket;
use components\AbstractController;
use Ratchet\App;

class ChatController extends AbstractController
{
    public function actionRun(): void
    {
        $app = new App('localhost', 8080);
        $app->route('/chat', new WebSocket(), ['*']);
        $app->run();
    }
}
