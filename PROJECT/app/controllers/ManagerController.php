<?php
session_start();

require_once __DIR__ . '/../models/Manager.php';
require_once __DIR__ . '/../models/Food.php';

$action = $_GET['action'] ?? 'dashboard';

// Check if manager is logged in
if(!isset($_SESSION['manager'])){
    if($action != 'login' && $action != 'register'){
        header('Location: index.php?page=manager&action=login');
        exit();
    }
}

if($action == 'login'){
    if(isset($_POST['login'])){
        $name = $_POST['name'];
        $password = $_POST['password'];

        $manager = Manager::loginByName($name);

        if($manager && password_verify($password, $manager['password'])){
            $_SESSION['manager'] = $manager['name'];
            $_SESSION['manager_id'] = $manager['id'];
            header('Location: index.php?page=manager&action=dashboard');
            exit();
        } else {
            $error = "Invalid credentials";
        }
    }

    require __DIR__ . '/../views/manager/login.php';
}

elseif($action == 'register'){
    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        Manager::register($name, $email, $password);
        header('Location: index.php?page=manager&action=login');
        exit();
    }

    require __DIR__ . '/../views/manager/register.php';
}

elseif($action == 'dashboard'){
    require __DIR__ . '/../views/manager/dashboard.php';
}

elseif($action == 'add-food'){
    if(isset($_POST['add_food'])){
        $food_name = $_POST['food_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category_id = $_POST['category_id'];

        // Handle image upload
        $image = '';
        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
            $upload_dir = __DIR__ . '/../../public/assets/images/';
            if(!is_dir($upload_dir)){
                mkdir($upload_dir, 0755, true);
            }
            $file_name = time() . '_' . basename($_FILES['image']['name']);
            $file_path = $upload_dir . $file_name;

            if(move_uploaded_file($_FILES['image']['tmp_name'], $file_path)){
                $image = $file_name;
            }
        }

        if(Food::addFood($food_name, $description, $price, $image, $category_id)){
            $_SESSION['success'] = "Food added successfully";
            header('Location: index.php?page=manager&action=add-food');
            exit();
        } else {
            $_SESSION['error'] = "Failed to add food";
        }
    }

    $categories = Food::getCategories();
    require __DIR__ . '/../views/manager/add_food.php';
}

elseif($action == 'users'){
    $users = Manager::getAllUsers();
    require __DIR__ . '/../views/manager/users.php';
}

elseif($action == 'apply-discount'){
    if(isset($_POST['apply_discount'])){
        $user_id = $_POST['user_id'];
        $points = $_POST['points'];
        $discount_amount = $_POST['discount_amount'];

        if(Manager::applyDiscountWithPoints($user_id, $points, $discount_amount)){
            $_SESSION['success'] = "Discount applied successfully";
        } else {
            $_SESSION['error'] = "Insufficient points for discount";
        }
    }

    header('Location: index.php?page=manager&action=users');
    exit();
}

elseif($action == 'logout'){
    session_destroy();
    header('Location: index.php');
    exit();
}

?>
