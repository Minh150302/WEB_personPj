<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/navbar.php'; ?>

<div class="container mt-5">

<!-- Breadcrumbs -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php?page=menu">Menu</a></li>
        <li class="breadcrumb-item"><a href="index.php?page=menu"><?php echo Food::getCategoryName($food['category_id']); ?></a></li>
        <li class="breadcrumb-item active"><?php echo $food['food_name']; ?></li>
    </ol>
</nav>

<div class="row mt-4">

<div class="col-md-6">
<img src="images/<?php echo $food['image']; ?>" class="img-fluid rounded">
</div>

<div class="col-md-6">

<h2><?php echo $food['food_name']; ?></h2>

<p class="text-muted"><?php echo $food['description']; ?></p>

<h4 class="text-danger">$<?php echo $food['price']; ?></h4>

<div class="mb-4">
    <span class="badge bg-warning text-dark">⭐ <?php echo number_format($food['rating'], 1); ?></span>
</div>

<h5 class="mt-4">📍 Available Locations:</h5>

<div class="list-group">
<?php 
require_once __DIR__ . '/../../models/Food.php';
$locations = Food::getFoodLocations($food['id']);
$has_locations = false;
while($loc = mysqli_fetch_assoc($locations)) { 
    $has_locations = true;
    $maps_url = "https://www.google.com/maps/search/" . urlencode($loc['address']);
?>
    <a href="<?php echo $maps_url; ?>" target="_blank" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
            <h6 class="mb-1"><?php echo $loc['location_name']; ?></h6>
            <span class="badge bg-success">Available</span>
        </div>
        <p class="mb-1"><small>📍 <?php echo $loc['address']; ?></small></p>
        <p class="mb-0"><small>📞 <?php echo $loc['phone']; ?></small></p>
    </a>
<?php } 
if(!$has_locations) {
    echo '<p class="text-muted">Currently not available at any location</p>';
}
?>
</div>

<a href="index.php?page=menu" class="btn btn-secondary mt-4">Back to Menu</a>

</div>

</div>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>