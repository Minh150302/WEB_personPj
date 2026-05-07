<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/navbar.php'; ?>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card p-4">

                <h2 class="mb-4">Assign Locations for: <?php echo $food['food_name']; ?></h2>

                <?php if(isset($_SESSION['success'])): ?>
                    <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
                <?php endif; ?>

                <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
                <?php endif; ?>

<form method="POST" action="index.php?page=manager&action=manage-food-locations">

<input type="hidden" name="food_id" value="<?php echo $food['id']; ?>">

<div class="mb-4">
    <h5>Food: <strong><?php echo $food['food_name']; ?></strong></h5>
    <p>Price: $<?php echo $food['price']; ?></p>
    <p>Description: <?php echo $food['description']; ?></p>
</div>

<div class="mb-4">
    <h5>Select Locations & Stock Availability</h5>
    
    <?php 
    $all_locations = mysqli_fetch_all($locations, MYSQLI_ASSOC);
    foreach($all_locations as $location): 
    ?>
    
    <div class="card mb-3 p-3">
        <div class="form-check mb-2">
            <input class="form-check-input location-checkbox" type="checkbox" name="location_ids[]" 
                   id="location_<?php echo $location['id']; ?>" value="<?php echo $location['id']; ?>"
                   <?php echo (isset($current[$location['id']]) && $current[$location['id']] > 0) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="location_<?php echo $location['id']; ?>">
                <strong><?php echo $location['name']; ?></strong> - <?php echo $location['address']; ?>
            </label>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Stock Quantity</label>
                <input type="number" class="form-control" name="stock_<?php echo $location['id']; ?>" 
                       value="<?php echo isset($current[$location['id']]) && $current[$location['id']] > 0 ? $current[$location['id']] : 10; ?>" 
                       min="0" max="999" placeholder="10">
            </div>
            <div class="col-md-6">
                <label class="form-label">Hours</label>
                <p><?php echo $location['hours']; ?></p>
            </div>
        </div>
    </div>
    
    <?php endforeach; ?>
</div>

<button type="submit" name="update_locations" class="btn btn-dark w-100">
Save Location Assignments
</button>

</form>

<a href="index.php?page=manager&action=manage-food-locations" class="btn btn-secondary mt-3 w-100">Back to Food List</a>

</div>
</div>

</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
