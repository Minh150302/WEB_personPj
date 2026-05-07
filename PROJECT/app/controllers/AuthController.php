<?php
session_start();

require_once __DIR__ . '/../models/User.php';

$page = $_GET['page'];

if ($page == 'register') {
    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        User::register($name, $email, $password);

        header('Location: index.php?page=login');
    }

    require __DIR__ . '/../views/auth/register.php';
}

if ($page == 'login') {
    if (isset($_POST['login'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];

        $user = User::loginByName($name);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['name'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            if (isset($_POST['remember'])) {
                setcookie('remember_user_id', $user['id'], time() + 30 * 24 * 60 * 60, '/');
            } elseif (isset($_COOKIE['remember_user_id'])) {
                setcookie('remember_user_id', '', time() - 3600, '/');
            }

            header('Location: index.php');
            exit();
        }
    }

    require __DIR__ . '/../views/auth/login.php';
}

if ($page == 'points') {
    require __DIR__ . '/../views/auth/points.php';
}

if ($page == 'logout') {
    if (isset($_COOKIE['remember_user_id'])) {
        setcookie('remember_user_id', '', time() - 3600, '/');
    }
    session_destroy();
    header('Location: index.php');
    exit();
}
?>