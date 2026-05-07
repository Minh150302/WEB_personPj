<?php
require_once __DIR__ . '/../../config/database.php';

class Manager {

    public static function login($email){
        global $conn;

        $sql = "SELECT * FROM managers WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_assoc($result);
    }

    public static function loginByName($name){
        global $conn;

        $sql = "SELECT * FROM managers WHERE name='$name'";
        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_assoc($result);
    }

    public static function register($name, $email, $password){
        global $conn;

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO managers(name, email, password)
                VALUES('$name', '$email', '$hashedPassword')";

        return mysqli_query($conn, $sql);
    }

    public static function getAllUsers(){
        global $conn;

        $sql = "SELECT id, name, email, royal_points FROM users ORDER BY royal_points DESC";
        return mysqli_query($conn, $sql);
    }

    public static function getUserById($id){
        global $conn;

        $sql = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public static function applyDiscountWithPoints($user_id, $points, $discount_amount){
        global $conn;

        // Check if user has enough points
        $user = self::getUserById($user_id);
        if($user['royal_points'] >= $points){
            $sql = "UPDATE users SET royal_points = royal_points - $points WHERE id=$user_id";
            return mysqli_query($conn, $sql);
        }
        return false;
    }
}
?>
