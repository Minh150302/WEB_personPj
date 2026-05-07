<?php
$page = $_GET['page'] ?? 'home';

switch($page){

    case 'menu':
        require __DIR__ . '/../app/controllers/FoodController.php';
        break;

    case 'detail':
        require __DIR__ . '/../app/controllers/FoodController.php';
        break;

    case 'login':
        require __DIR__ . '/../app/controllers/AuthController.php';
        break;

    case 'register':
        require __DIR__ . '/../app/controllers/AuthController.php';
        break;

    default:
        require __DIR__ . '/../app/views/home/index.php';
        break;
}
?>