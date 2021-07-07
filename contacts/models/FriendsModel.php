<?php

function addFriend(int $userId, int $friendId): bool
{
    $connect = getDbConnection();

    $sql = <<<SQL
        INSERT IGNORE INTO `friends` (`user_id`, `friend_id`)
        VALUES (?, ?)
    SQL;

    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'ii', $userId, $friendId);
    return mysqli_stmt_execute($stmt);
}

function removeFriend(int $userId, int $friendId): bool
{
    $connect = getDbConnection();

    $sql = 'DELETE FROM `friends` WHERE (`user_id` = ? AND `friend_id` = ?)';
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'ii', $userId, $friendId);
    return mysqli_stmt_execute($stmt);
}

function getAvailableFriends(int $userId, int $page = 1, int $limit = 50): array
{
    $connect = getDbConnection();
    $sql = <<<SQL
        SELECT
               id, 
               name, 
               login, 
               birthday,
               created_at,
               (friends.user_id IS NOT NULL) AS is_my_friend
        FROM users
        LEFT JOIN friends ON (friends.friend_id = users.id AND friends.user_id = ?)
        ORDER BY name, login
        LIMIT ?
        OFFSET ?
    SQL;

    $offset = ($page - 1) * $limit;

    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'iii', $userId, $limit, $offset);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getMyFriends(int $userId, int $page = 1, int $limit = 50): array
{
    $connect = getDbConnection();
    $sql = <<<SQL
        SELECT
               id, 
               name, 
               login, 
               birthday,
               created_at,
               true AS is_my_friend
        FROM users
        INNER JOIN friends ON friends.friend_id = users.id
        WHERE friends.user_id = ?
        ORDER BY name, login
        LIMIT ?
        OFFSET ?
    SQL;

    $offset = ($page - 1) * $limit;

    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'iii', $userId, $limit, $offset);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getMyFriendsCount(int $userId): int
{
    $connect = getDbConnection();
    $sql = <<<SQL
        SELECT COUNT(1) AS quantity
        FROM users
        INNER JOIN friends ON friends.friend_id = users.id
        WHERE friends.user_id = ?
    SQL;

    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);

    return $data['quantity'];
}
