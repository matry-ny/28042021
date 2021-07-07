<?php

model('UsersModel');

function actionLogout()
{
    $_SESSION = [];
    session_destroy();

    redirect('/guest/login');
}

function actionGenerate()
{
    $count = (int)($_GET['count'] ?? 1);
    generateRandomUsers($count);
}
