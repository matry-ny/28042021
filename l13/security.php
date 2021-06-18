<?php

require_once __DIR__ . '/helpers/response.php';

session_start();

$isGuest = empty($_SESSION['user']);
if ($isGuest) {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    if (login($login, $password)) {
        redirect('index.php');
    } else {
        require __DIR__ . '/auth.php';
        exit;
    }
}

function login(string $login, string $password): bool
{
    if (empty($login) || empty($password)) {
        return false;
    }

    // password_hash('1231234', PASSWORD_ARGON2ID)
    $users = [
        [
            'login' => 'test@test.com',
            'password' => '$argon2id$v=19$m=65536,t=4,p=1$VUZFTUFyc043SndST1ovTA$81qCLA/oE0Sgg0cl3vmDzzlgiB6QGW0cnQAQZqMPr0E',
        ],
        [
            'login' => 'test2@test.com',
            'password' => '$argon2id$v=19$m=65536,t=4,p=1$b2M4MXVuRjFiM0FJa3hEYQ$oMwSZ8qQ5TCo/gF3xYDHYJEg5GlaIqMZF0BGEfILEIQ',
        ],
    ];

    $filtered = array_filter(
        $users,
        fn (array $user) => ($login === $user['login'])
    );

    if (!$filtered || count($filtered) > 1) {
        return false;
    }

    $user = current($filtered);
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        return true;
    }

    return false;
}
