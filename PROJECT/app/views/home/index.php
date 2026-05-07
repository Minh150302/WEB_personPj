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

    <h2 class="text-center mb-4">Top Rated Foods</h2>

    <div class="row">
        <?php 
        require_once __DIR__ . '/../../models/Food.php';
        $foods = Food::getTopRatedFoods(3);
        while($row = mysqli_fetch_assoc($foods)) { 
        ?>

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <div class="position-relative">
                    <img src="images/<?php echo $row['image']; ?>" class="card-img-top" style="height: 250px; object-fit: cover;">
                    <span class="badge bg-danger position-absolute top-0 end-0 m-2"><?php echo number_format($row['rating'], 1); ?></span>
                </div>
                <div class="card-body">
                    <h5><?php echo $row['food_name']; ?></h5>
                    <p class="text-muted"><?php echo substr($row['description'], 0, 60); ?>...</p>
                    <p class="fw-bold">$<?php echo $row['price']; ?></p>
                    <a href="index.php?page=detail&id=<?php echo $row['id']; ?>" class="btn btn-dark w-100">View Details</a>
                </div>
            </div>
        </div>

        <?php } ?>
    </div>

</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>