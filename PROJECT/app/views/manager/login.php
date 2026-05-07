<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/navbar.php'; ?>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card p-4">

                <h2 class="mb-4">Manager Login</h2>

                <form method="POST">

                    <input type="text" name="name" class="form-control mb-3" placeholder="Username" required>

                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

                    <button type="submit" name="login" class="btn btn-dark w-100">
                        Login
                    </button>

                </form>

                <p class="mt-3">Don't have an account? <a href="index.php?page=manager&action=register">Register here</a></p>

            </div>

        </div>

    </div>

</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
