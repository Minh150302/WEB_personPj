<?php require __DIR__ . '/../app/views/layouts/header.php'; ?>
<?php require __DIR__ . '/../app/views/layouts/navbar.php'; ?>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card p-4">

<h2 class="mb-4">Login</h2>

<form method="POST">

<input type="email" name="email" class="form-control mb-3" placeholder="Email">

<input type="password" name="password" class="form-control mb-3" placeholder="Password">

<button type="submit" name="login" class="btn btn-dark w-100">
Login
</button>

</form>

</div>
</div>
</div>
</div>

<?php require __DIR__ . '/../app/views/layouts/footer.php'; ?>