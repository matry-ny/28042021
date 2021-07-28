<?php

namespace web\controllers;

use App;
use models\UserContactEntity;
use models\UserEntity;
use web\components\AbstractWebController;

class UsersController extends AbstractWebController
{
    public function actionList()
    {
        // INSERT
        $users = UserEntity::findAll();
        $randomUserId = array_rand($users);
        $randomUser = $users[$randomUserId];

        $contact = new UserContactEntity();
        $contact->contact = '+380' . random_int(100000000, 999999999);
        $contact->type = UserContactEntity::TYPE_PHONE;
        $contact->user_id = $randomUser->id;
        $contact->save();

        var_dump($contact);exit;

        // UPDATE
        $user = UserEntity::findOne(11);
        $user->name = 'Yuri Redner';
        $user->birthday = '1974-03-08';
        var_dump($user->save(), $user);
//
//
//        $user = UserEntity::findOne(4576);
//        $user->delete();
//        var_dump($user);
exit;


        // SELECT
//        var_dump(
//            UserEntity::findOne(11),
//            UserEntity::findOne(110),
//            UserContactEntity::findOne(3),
//            UserContactEntity::findAll()
//        );exit;
        $t = App::get()->template()?->render('users/list');
        echo($t);
    }

    public function actionLogout(): void
    {
        App::get()->user()->logout();
        $this->redirect($this->config()->get('loginPage'));
    }
}
