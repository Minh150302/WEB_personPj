<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/navbar.php'; ?>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card p-4">

<h2 class="mb-4">Add New Food</h2>

<?php if(isset($_SESSION['success'])): ?>
    <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
<?php endif; ?>

<?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label class="form-label">Food Name</label>
<input type="text" name="food_name" class="form-control" placeholder="Enter food name" required>
</div>

<div class="mb-3">
<label class="form-label">Description</label>
<textarea name="description" class="form-control" placeholder="Enter description" rows="3" required></textarea>
</div>

<div class="mb-3">
<label class="form-label">Price</label>
<input type="number" name="price" class="form-control" placeholder="Enter price" step="0.01" required>
</div>

<div class="mb-3">
<label class="form-label">Category</label>
<select name="category_id" class="form-control" required>
<option value="">Select category</option>
<?php while($category = mysqli_fetch_assoc($categories)): ?>
    <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
<?php endwhile; ?>
</select>
</div>

<div class="mb-3">
<label class="form-label">Food Image</label>
<input type="file" name="image" class="form-control" accept="image/*" required>
</div>

<button type="submit" name="add_food" class="btn btn-dark w-100">
Add Food
</button>

</form>

<a href="index.php?page=manager&action=dashboard" class="btn btn-secondary mt-3">Back to Dashboard</a>

</div>
</div>
</div>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
