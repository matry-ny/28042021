<?php

namespace cli\controllers;

use cli\components\WebSocket;
use components\AbstractController;
use Ratchet\App;

class ChatController extends AbstractController
{
    public function actionRun(): void
    {
        $app = new App('ws.skillup.local', 3000, '0.0.0.0');
        $app->route('/chat', new WebSocket(), ['*']);
        $app->run();
    }
}
