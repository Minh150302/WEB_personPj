<?php
require_once __DIR__ . '/../app/models/Food.php';

$page = $_GET['page'];

if($page == 'menu'){

    $foods = Food::getAllFoods();

    require __DIR__ . '/../app/views/foods/menu.php';
}

if($page == 'detail'){

    $id = $_GET['id'];

    $food = Food::getFoodById($id);

    require __DIR__ . '/../app/views/foods/detail.php';
}
?>