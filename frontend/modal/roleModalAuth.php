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
            <input type="text" name="roleName" class="form-control" value="<?php echo $row['roleName']; ?>" placeholder="Enter role name" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Role Description</label>
            <input type="text" name="roleDesc" class="form-control" value="<?php echo $row['roleDesc']; ?>" placeholder="Enter role description" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle me-1"></i>Cancel</button>
          <button type="submit" name="updateRole" class="btn btn-primary"><i class="bi bi-save me-1"></i>Update</button>
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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle me-1"></i>Cancel</button>
          <button type="submit" name="deleteRole" class="btn btn-danger"><i class="bi bi-trash me-1"></i>Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
