<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/navbar.php'; ?>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card p-4">

                <h2 class="mb-4">Login</h2>

                <form method="POST">

                    <input type="text" name="name" class="form-control mb-3" placeholder="Name" required>

                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>

                    <button type="submit" name="login" class="btn btn-dark w-100">
                        Login
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>