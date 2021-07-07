<?php

model('FriendsModel');

function actionIndex()
{
    $page = (int)($_GET['page'] ?? 1);
    $limit = (int)($_GET['limit'] ?? config('recordsOnPage'));
    $userId = $_SESSION['user']['id'];

    $totalPages = ceil(getMyFriendsCount($userId) / $limit);

    render('index/index', [
        'users' => getMyFriends($userId, $page, $limit),
        'totalPages' => $totalPages,
        'currentPage' => $page,
        'paginationUrl' => '/',
    ]);
}
