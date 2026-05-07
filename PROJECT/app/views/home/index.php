<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/navbar.php'; ?>

<section class="hero d-flex justify-content-center align-items-center text-white text-center">

<div>
<h1>Welcome To FOOD</h1>
<p>Best Restaurant In City</p>

<a href="index.php?page=menu" class="btn btn-warning">
Explore Menu
</a>
</div>

</section>

<div class="container mt-5">

<h2 class="text-center mb-4">Popular Foods</h2>

<div class="row">

<div class="col-md-4">
<div class="card">
<img src="images/pizza.png" class="card-img-top">
<div class="card-body">
<h5>Seafood Pizza</h5>
<p>$12.99</p>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card">
<img src="images/burger.png" class="card-img-top">
<div class="card-body">
<h5>Cheese Burger</h5>
<p>$8.99</p>
</div>
</div>
</div>

</div>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>