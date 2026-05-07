<?php
require_once __DIR__ . '/../../config/database.php';
    
class Food {

    public static function getAllFoods(){
        global $conn;

        $sql = "SELECT * FROM foods ORDER BY price ASC";
        return mysqli_query($conn, $sql);
    }

    public static function getFoodById($id){
        global $conn;

        $sql = "SELECT * FROM foods WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_assoc($result);
    }

    public static function addFood($food_name, $description, $price, $image, $category_id){
        global $conn;

        $sql = "INSERT INTO foods(food_name, description, price, image, rating, category_id)
                VALUES('$food_name', '$description', $price, '$image', 0, $category_id)";
        
        return mysqli_query($conn, $sql);
    }

    public static function deleteFood($id){
        global $conn;

        $sql = "DELETE FROM foods WHERE id=$id";
        return mysqli_query($conn, $sql);
    }

    public static function updateFood($id, $food_name, $description, $price, $image, $category_id){
        global $conn;

        $sql = "UPDATE foods SET food_name='$food_name', description='$description', price=$price, image='$image', category_id=$category_id WHERE id=$id";
        return mysqli_query($conn, $sql);
    }

    public static function getCategories(){
        global $conn;

        $sql = "SELECT * FROM categories";
        return mysqli_query($conn, $sql);
    }
}
?>