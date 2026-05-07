<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Food.php';

$query = $_GET['q'] ?? '';

if(strlen($query) < 1){
    echo json_encode([]);
    exit();
}

$results = Food::searchFoods($query);
$foods = [];

while($row = mysqli_fetch_assoc($results)){
    $foods[] = [
        'id' => $row['id'],
        'food_name' => $row['food_name'],
        'price' => $row['price'],
        'image' => $row['image'],
        'description' => substr($row['description'], 0, 60) . '...'
    ];
}

echo json_encode($foods);
?>
