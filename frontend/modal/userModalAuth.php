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
                <input type="text" name="fullName" class="form-control" value="<?php echo $row['fullName']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
            </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="updateUser" class="btn btn-primary">Update</button>
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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="deleteUser" class="btn btn-danger">Delete</button>
        </div>
      </form>

    </div>
  </div>
</div>
