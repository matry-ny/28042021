<?php

namespace web\controllers;

use App;
use helpers\RequestHelper;
use models\UserEntity;
use web\components\AbstractWebController;

class GuestController extends AbstractWebController
{
    public function actionLogin(): void
    {
        $errors = [];
        if (RequestHelper::isPost()) {
            $user = UserEntity::findOne($_POST['login'], 'login');
            if ($user && password_verify($_POST['password'], $user->password)) {
                App::get()->user()->login($user);
                $this->redirect(App::get()->config()->get('mainPage'));
            } else {
                $errors['login'] = 'Login or password is incorrect';
            }
        }

        echo App::get()->template()?->render('guest/login', ['errors' => $errors], 'guest');
    }
}
