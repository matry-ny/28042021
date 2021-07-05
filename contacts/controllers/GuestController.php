<?php

require_once __DIR__ . '/../models/UsersModel.php';

function actionLogin()
{
    $errors = [];
    if (isPostRequest()) {
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($login)) {
            $errors['login'] = 'Login is required';
        }
        if (empty($password)) {
            $errors['password'] = 'Password is required';
        }

        $user = findUserByLogin($login);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            redirect('/');
        }

        $errors['login'] = 'Login or password is incorrect';
    }

    render('guest/login', ['errors' => $errors], 'guest');
}

function actionRegistration()
{
    $errors = [];
    if (isPostRequest()) {
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';
        $repeatPassword = $_POST['repeatPassword'] ?? '';

        if (strlen($login) < 3) {
            $errors['login'] = 'Login is too short';
        }
        if (strlen($password) < 5) {
            $errors['password'] = 'Password is too short';
        }
        if ($password !== $repeatPassword) {
            $errors['repeatPassword'] = 'Password and Repeat Password are not equals';
        }

        if (empty($errors)) {
            if (!createUser($_POST)) {
                $errors['login'] = 'User can not be created';
            } else {
                redirect('/guest/login');
            }
        }
    }
    render('guest/registration', ['errors' => $errors], 'guest');
}
