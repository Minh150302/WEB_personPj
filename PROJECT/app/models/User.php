<?php
require_once __DIR__ . '/../../config/database.php';

class User {

    public static function register($name, $email, $password){

        global $conn;

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(name,email,password,royal_points)
                VALUES('$name','$email','$hashedPassword', 0)";

        return mysqli_query($conn, $sql);
    }

    public static function login($email){

        global $conn;

        $sql = "SELECT * FROM users WHERE email='$email'";

        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_assoc($result);
    }

    public static function loginByName($name){
        global $conn;

        $sql = "SELECT * FROM users WHERE name='$name'";

        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_assoc($result);
    }

    public static function getById($id){
        global $conn;

        $sql = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_assoc($result);
    }

    public static function getRoyalPoints($user_id){
        global $conn;

        $sql = "SELECT royal_points FROM users WHERE id=$user_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['royal_points'] ?? 0;
    }

    public static function addRoyalPoints($user_id, $points){
        global $conn;

        $sql = "UPDATE users SET royal_points = royal_points + $points WHERE id=$user_id";
        return mysqli_query($conn, $sql);
    }

    public static function deductRoyalPoints($user_id, $points){
        global $conn;

        $current_points = self::getRoyalPoints($user_id);
        if($current_points >= $points){
            $sql = "UPDATE users SET royal_points = royal_points - $points WHERE id=$user_id";
            return mysqli_query($conn, $sql);
        }
        return false;
    }
}
?>