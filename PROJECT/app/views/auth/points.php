<?php 
require_once __DIR__ . '/../../models/User.php';
require __DIR__ . '/../layouts/header.php'; 
?>
<?php require __DIR__ . '/../layouts/navbar.php'; ?>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card p-4">

<h2 class="mb-4">My Royal Points</h2>

<?php
if(isset($_SESSION['user_id'])){
    $user = User::getById($_SESSION['user_id']);
    if($user):
?>

<div class="alert alert-info">
    <h4>Welcome, <?php echo $_SESSION['user_name']; ?></h4>
    <p class="mb-0">Your Royal Points: <strong class="text-warning"><?php echo $user['royal_points']; ?> pts</strong></p>
</div>

<div class="mt-4">
    <h5>About Royal Points</h5>
    <ul>
        <li>Earn royal points with every purchase</li>
        <li>Use points for discounts (managed by restaurant staff)</li>
        <li>The more you spend, the more points you accumulate</li>
    </ul>
</div>

<a href="index.php?page=home" class="btn btn-dark mt-3">Back to Home</a>

<?php
    else:
?>
    <div class="alert alert-warning">Please log in to view your points</div>
    <a href="index.php?page=login" class="btn btn-dark">Login</a>
<?php
    endif;
} else {
?>
    <div class="alert alert-warning">Please log in to view your points</div>
    <a href="index.php?page=login" class="btn btn-dark">Login</a>
<?php
}
?>

</div>
</div>
</div>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
