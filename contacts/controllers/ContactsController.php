<?php

model('UsersModel');
model('FriendsModel');

function actionList()
{
    $page = (int)($_GET['page'] ?? 1);
    $limit = (int)($_GET['limit'] ?? config('recordsOnPage'));

    $totalPages = ceil(getAllUsersCount() / $limit);
    $userId = $_SESSION['user']['id'];

    render('contacts/list', [
        'users' => getAvailableFriends($userId, $page, $limit),
        'totalPages' => $totalPages,
        'currentPage' => $page,
        'paginationUrl' => '/contacts/list',
    ]);
}
