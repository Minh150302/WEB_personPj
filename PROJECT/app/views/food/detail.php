<?php require __DIR__ . '/../app/views/layouts/header.php'; ?>
<?php require __DIR__ . '/../app/views/layouts/navbar.php'; ?>

<div class="container mt-5">

<nav>
Home > Menu > <?php echo $food['food_name']; ?>
</nav>

<div class="row mt-4">

<div class="col-md-6">
<img src="images/<?php echo $food['image']; ?>" class="img-fluid">
</div>

<div class="col-md-6">

<h2><?php echo $food['food_name']; ?></h2>

<p><?php echo $food['description']; ?></p>

<h4>$<?php echo $food['price']; ?></h4>

<p>Available at:</p>

<ul>
<li>District 1 Branch</li>
<li>District 7 Branch</li>
</ul>

<a href="https://maps.google.com" target="_blank" class="btn btn-primary">
Open Google Maps
</a>

</div>

</div>
</div>

<?php require __DIR__ . '/../app/views/layouts/footer.php'; ?>