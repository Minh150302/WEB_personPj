<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/navbar.php'; ?>

<div class="container mt-5">

<div class="row">
<div class="col-md-12">

<h2 class="mb-4">Manage Food Locations</h2>

<?php if(isset($_SESSION['success'])): ?>
    <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
<?php endif; ?>

<?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
<?php endif; ?>

<div class="table-responsive">
<table class="table table-striped table-hover">

<thead class="table-dark">
<tr>
<th>Food Name</th>
<th>Price</th>
<th>Category</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php 
if(mysqli_num_rows($foods) > 0){
    while($food = mysqli_fetch_assoc($foods)): 
?>
    <tr>
    <td><?php echo $food['food_name']; ?></td>
    <td>$<?php echo $food['price']; ?></td>
    <td><?php echo $food['category_id']; ?></td>
    <td>
        <a href="index.php?page=manager&action=manage-food-locations&food_id=<?php echo $food['id']; ?>" class="btn btn-sm btn-primary">
            Manage Locations
        </a>
    </td>
    </tr>
<?php 
    endwhile;
} else {
?>
    <tr>
        <td colspan="4" class="text-center text-muted py-4">
            <p>No foods found. <a href="index.php?page=manager&action=add-food">Add a new food</a></p>
        </td>
    </tr>
<?php 
}
?>
</tbody>

</table>
</div>

<a href="index.php?page=manager&action=dashboard" class="btn btn-secondary mt-3">Back to Dashboard</a>

</div>
</div>

</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
