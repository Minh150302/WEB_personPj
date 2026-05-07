<?php
require_once __DIR__ . '/../models/Food.php';

header('Content-Type: application/json');

$query = $_GET['q'] ?? '';

if(strlen($query) < 1){
    echo json_encode([]);
    exit();
}

$foods = Food::searchFoods($query);
$results = [];

while($row = mysqli_fetch_assoc($foods)){
    $results[] = [
        'id' => $row['id'],
        'name' => $row['food_name'],
        'price' => $row['price'],
        'image' => $row['image'],
        'description' => substr($row['description'], 0, 60) . '...'
    ];
}

echo json_encode($results);
?>
