<?php
require_once __DIR__ . '/../models/Food.php';

$page = $_GET['page'];

if ($page == 'menu') {
    $foods = Food::getAllFoods();
    require __DIR__ . '/../views/food/menu.php';
}

if ($page == 'detail') {
    $id = $_GET['id'];
    $food = Food::getFoodById($id);
    require __DIR__ . '/../views/food/detail.php';
}
?>