<div class="modal fade" id="editUserModal<?php echo $row['userID']; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST" action="../backend/userAuth.php">
        <div class="modal-header">
          <h5 class="modal-title">Edit User | <?php echo $row['fullName']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

            <input type="hidden" name="userID" value="<?php echo $row['userID']; ?>">

            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="fullName" class="form-control" value="<?php echo $row['fullName']; ?>" placeholder="Enter full name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" placeholder="Enter username" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" placeholder="Enter email address" required>
            </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle me-1"></i>Cancel</button>
          <button type="submit" name="updateUser" class="btn btn-primary"><i class="bi bi-save me-1"></i>Update</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="modal fade" id="deleteUserModal<?php echo $row['userID']; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST" action="../backend/userAuth.php">
        <div class="modal-header">
          <h5 class="modal-title">Delete User | <?php echo $row['fullName']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

            <input type="hidden" name="userID" value="<?php echo $row['userID']; ?>">

            <p>Are you sure you want to delete this user?</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle me-1"></i>Cancel</button>
          <button type="submit" name="deleteUser" class="btn btn-danger"><i class="bi bi-trash me-1"></i>Delete</button>
        </div>
      </form>

    </div>
  </div>
</div>
