<div class="modal fade" id="editRoleModal<?php echo $row['roleID']; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="../backend/roleAuth.php">
        <div class="modal-header">
          <h5 class="modal-title">Edit Role | <?php echo $row['roleName']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="roleID" value="<?php echo $row['roleID']; ?>">

          <div class="mb-3">
            <label class="form-label">Role Name</label>
            <input type="text" name="roleName" class="form-control" value="<?php echo $row['roleName']; ?>" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Role Description</label>
            <input type="text" name="roleDesc" class="form-control" value="<?php echo $row['roleDesc']; ?>" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="updateRole" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteRoleModal<?php echo $row['roleID']; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="../backend/roleAuth.php">
        <div class="modal-header">
          <h5 class="modal-title">Delete Role | <?php echo $row['roleName']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="roleID" value="<?php echo $row['roleID']; ?>">
          <p>Are you sure you want to delete this role?</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="deleteRole" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
