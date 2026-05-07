<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/navbar.php'; ?>

<div class="container mt-5">

<div class="row">
<div class="col-md-12">
<h1>Manager Dashboard</h1>
<p>Welcome, <?php echo $_SESSION['manager']; ?></p>

<div class="row mt-4">

<div class="col-md-4">
<div class="card p-4 text-center">
<h5>Add Food</h5>
<p>Add new food items to the menu</p>
<a href="index.php?page=manager&action=add-food" class="btn btn-dark">Add Food</a>
</div>
</div>

<div class="col-md-4">
<div class="card p-4 text-center">
<h5>View Users</h5>
<p>Check user royal points and apply discounts</p>
<a href="index.php?page=manager&action=users" class="btn btn-dark">View Users</a>
</div>
</div>

<div class="col-md-4">
<div class="card p-4 text-center">
<h5>Logout</h5>
<p>Exit manager panel</p>
<a href="index.php?page=manager&action=logout" class="btn btn-danger">Logout</a>
</div>
</div>

</div>

</div>
</div>

</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
