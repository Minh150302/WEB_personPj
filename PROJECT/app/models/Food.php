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
}
?>