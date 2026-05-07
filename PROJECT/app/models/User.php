<?php
require_once __DIR__ . '/../../config/database.php';

class User {

    public static function register($name, $email, $password){

        global $conn;

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(name,email,password)
                VALUES('$name','$email','$hashedPassword')";

        return mysqli_query($conn, $sql);
    }

    public static function login($email){

        global $conn;

        $sql = "SELECT * FROM users WHERE email='$email'";

        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_assoc($result);
    }
}
?>