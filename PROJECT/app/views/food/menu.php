<?php require __DIR__ . '/../app/views/layouts/header.php'; ?>
<?php require __DIR__ . '/../app/views/layouts/navbar.php'; ?>

<div class="container mt-5">

<h2 class="mb-4">Food Menu</h2>

<input type="text" id="search" class="form-control mb-4" placeholder="Search foods...">

<div class="row" id="result">

<?php while($row = mysqli_fetch_assoc($foods)) { ?>

<div class="col-md-4 mb-4">

<div class="card h-100">

<img src="images/<?php echo $row['image']; ?>" class="card-img-top">

<div class="card-body">

<h5><?php echo $row['food_name']; ?></h5>

<p><?php echo $row['description']; ?></p>

<p>$<?php echo $row['price']; ?></p>

<a href="index.php?page=detail&id=<?php echo $row['id']; ?>"
class="btn btn-dark">
View Details
</a>

</div>
</div>
</div>

<?php } ?>

</div>
</div>

<?php require __DIR__ . '/../app/views/layouts/footer.php'; ?>