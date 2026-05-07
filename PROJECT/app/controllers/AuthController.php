<?php
session_start();

require_once __DIR__ . '/../app/models/User.php';

$page = $_GET['page'];

if($page == 'register'){

    if(isset($_POST['register'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        User::register($name, $email, $password);

        header('Location: index.php?page=login');
    }

    require __DIR__ . '/../app/views/auth/register.php';
}

if($page == 'login'){

    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = User::login($email);

        if($user && password_verify($password, $user['password'])){

            $_SESSION['user'] = $user['name'];

            header('Location: index.php');
        }
    }

    require __DIR__ . '/../app/views/auth/login.php';
}
?>