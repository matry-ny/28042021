<?php

require_once __DIR__ . '/../models/UsersModel.php';

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
