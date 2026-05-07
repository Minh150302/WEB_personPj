<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/navbar.php'; ?>

<div class="container mt-5">

<div class="row">
<div class="col-md-12">

<h2 class="mb-4">Users & Royal Points</h2>

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
<th>Name</th>
<th>Email</th>
<th>Royal Points</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php while($user = mysqli_fetch_assoc($users)): ?>
    <tr>
    <td><?php echo $user['name']; ?></td>
    <td><?php echo $user['email']; ?></td>
    <td><span class="badge bg-warning text-dark"><?php echo $user['royal_points']; ?> pts</span></td>
    <td>
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#discountModal" 
            onclick="setUserData(<?php echo $user['id']; ?>, '<?php echo $user['name']; ?>', <?php echo $user['royal_points']; ?>)">
            Apply Discount
        </button>
    </td>
    </tr>
<?php endwhile; ?>
</tbody>

</table>
</div>

<a href="index.php?page=manager&action=dashboard" class="btn btn-secondary mt-3">Back to Dashboard</a>

</div>
</div>

</div>

<!-- Discount Modal -->
<div class="modal fade" id="discountModal" tabindex="-1" aria-labelledby="discountModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="discountModalLabel">Apply Discount</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="index.php?page=manager&action=apply-discount">
      <div class="modal-body">
        <p><strong>User:</strong> <span id="userName"></span></p>
        <p><strong>Available Points:</strong> <span id="userPoints"></span></p>
        
        <div class="mb-3">
          <label class="form-label">Points to Use</label>
          <input type="number" name="points" class="form-control" placeholder="Enter points" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Discount Amount ($)</label>
          <input type="number" name="discount_amount" class="form-control" placeholder="Enter discount amount" step="0.01" required>
        </div>

        <input type="hidden" name="user_id" id="userId">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="apply_discount" class="btn btn-primary">Apply Discount</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
function setUserData(userId, userName, userPoints) {
    document.getElementById('userId').value = userId;
    document.getElementById('userName').textContent = userName;
    document.getElementById('userPoints').textContent = userPoints + ' pts';
}
</script>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
