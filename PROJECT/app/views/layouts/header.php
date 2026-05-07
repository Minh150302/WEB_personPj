<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION['user']) && isset($_COOKIE['remember_user_id'])){
    require_once __DIR__ . '/../../models/User.php';
    $rememberedUser = User::getById((int) $_COOKIE['remember_user_id']);
    if($rememberedUser){
        $_SESSION['user'] = $rememberedUser['name'];
        $_SESSION['user_id'] = $rememberedUser['id'];
        $_SESSION['user_name'] = $rememberedUser['name'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FOOD Restaurant</title>

<meta name="description" content="Restaurant food ordering website">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

</head>
<body>