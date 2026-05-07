<?php 
require_once __DIR__ . '/../../models/Food.php';
require __DIR__ . '/../layouts/header.php'; 
?>
<?php require __DIR__ . '/../layouts/navbar.php'; ?>

<div class="container mt-5">

<!-- Breadcrumb Navigation -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php?page=menu">Menu</a></li>
        <li class="breadcrumb-item"><a href="index.php?page=menu"><?php echo $food['category_id'] ? 'Food' : 'Menu'; ?></a></li>
        <li class="breadcrumb-item active"><?php echo $food['food_name']; ?></li>
    </ol>
</nav>

<div class="row mt-4">

<div class="col-md-6">
<img src="images/<?php echo $food['image']; ?>" class="img-fluid rounded" style="max-height: 500px; object-fit: cover;">
</div>

<div class="col-md-6">

<h2><?php echo $food['food_name']; ?></h2>

<p class="text-muted"><?php echo $food['description']; ?></p>

<h4 class="text-danger">$<?php echo number_format($food['price'], 2); ?></h4>

<div class="mb-3">
    <span class="badge bg-warning text-dark"><?php echo number_format($food['rating'], 1); ?> / 5.0</span>
</div>

<p><strong>Availability:</strong> In Stock</p>

<!-- Locations Section -->
<div class="mt-4">
    <h5>Available at Our Locations</h5>
    <?php 
    $locations = Food::getLocationsByFoodId($food['id']);
    if(mysqli_num_rows($locations) > 0) {
        while($location = mysqli_fetch_assoc($locations)) {
            ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h6><?php echo $location['name']; ?></h6>
                    <p class="small mb-2"><strong>Address:</strong> <?php echo $location['address']; ?></p>
                    <p class="small"><strong>Stock:</strong> <?php echo $location['stock']; ?> available</p>
                    <a href="https://maps.google.com/?q=<?php echo urlencode($location['address']); ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                        View on Google Maps
                    </a>
                </div>
            </div>
            <?php
        }
    } else {
        echo '<p class="text-muted">Not available at any location</p>';
    }
    ?>
</div>

</div>

</div>

</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>