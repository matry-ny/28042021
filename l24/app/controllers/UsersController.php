<?php

namespace app\controllers;

use traits\GoogleTrait;
use traits\YandexTrait;

class UsersController
{
    use GoogleTrait, YandexTrait {
        GoogleTrait::sendData insteadof YandexTrait;
        GoogleTrait::sendData as sendGoogleData;
        YandexTrait::sendData as sendYandexData;
    }

    public function testTraits(): void
    {
        $this->sendData(['Google 2']);
        $this->sendGoogleData(['Google']);
        $this->sendYandexData(['Yandex']);
        $this->sendData(['Bing']);
    }
}
