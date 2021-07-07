<?php

model('FriendsModel');

function actionAdd()
{
    $friendId = $_GET['id'] ?? null;
    if (empty($friendId)) {
        exit('Friend id is required');
    }

    $isOk = addFriend($_SESSION['user']['id'], $friendId);
    if (!$isOk) {
        exit('Friend can not be added');
    }

    redirect($_SERVER['HTTP_REFERER']);
}

function actionDelete()
{
    $friendId = $_GET['id'] ?? null;
    if (empty($friendId)) {
        exit('Friend id is required');
    }

    $isOk = removeFriend($_SESSION['user']['id'], $friendId);
    if (!$isOk) {
        exit('Friend can not be removed');
    }

    redirect($_SERVER['HTTP_REFERER']);
}
