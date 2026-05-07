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

    public static function getTopRatedFoods($limit = 3){
        global $conn;

        $sql = "SELECT * FROM foods ORDER BY rating DESC LIMIT $limit";
        return mysqli_query($conn, $sql);
    }

    public static function updateRating($id, $rating){
        global $conn;

        $rating = max(0, min(5, $rating));
        $sql = "UPDATE foods SET rating=$rating WHERE id=$id";
        return mysqli_query($conn, $sql);
    }

    public static function getAllFoodsForManagement(){
        global $conn;

        $sql = "SELECT * FROM foods ORDER BY food_name ASC";
        return mysqli_query($conn, $sql);
    }

    public static function searchFoods($query){
        global $conn;

        $query = mysqli_real_escape_string($conn, $query);
        $sql = "SELECT * FROM foods WHERE food_name LIKE '%$query%' OR description LIKE '%$query%' ORDER BY food_name ASC";
        return mysqli_query($conn, $sql);
    }

    public static function getLocationsByFoodId($food_id){
        global $conn;

        // Check if food_locations table exists
        $check = mysqli_query($conn, "SHOW TABLES LIKE 'food_locations'");
        
        if(mysqli_num_rows($check) > 0){
            // Get ONLY locations assigned to this food from food_locations table
            $sql = "SELECT l.*, fl.stock FROM locations l 
                    INNER JOIN food_locations fl ON l.id = fl.location_id AND fl.food_id = $food_id
                    ORDER BY l.id ASC";
        } else {
            // Fallback: return all locations with default stock if table doesn't exist
            $sql = "SELECT *, 10 as stock FROM locations";
        }
        
        return mysqli_query($conn, $sql);
    }

    public static function getAllLocations(){
        global $conn;

        $sql = "SELECT * FROM locations";
        return mysqli_query($conn, $sql);
    }
}
?>