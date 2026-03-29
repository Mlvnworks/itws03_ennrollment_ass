<div class="modal fade" id="editCampusModal<?php echo $row['campusID']; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="../backend/campusAuth.php">
        <div class="modal-header">
          <h5 class="modal-title">Edit Campus | <?php echo $row['campusName']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="campusID" value="<?php echo $row['campusID']; ?>">

          <div class="mb-3">
            <label class="form-label">Campus Name</label>
            <input type="text" name="campusName" class="form-control" value="<?php echo $row['campusName']; ?>" placeholder="Enter campus name" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Campus Description</label>
            <input type="text" name="campusDesc" class="form-control" value="<?php echo $row['campusDesc']; ?>" placeholder="Enter campus description" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle me-1"></i>Cancel</button>
          <button type="submit" name="updateCampus" class="btn btn-primary"><i class="bi bi-save me-1"></i>Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteCampusModal<?php echo $row['campusID']; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="../backend/campusAuth.php">
        <div class="modal-header">
          <h5 class="modal-title">Delete Campus | <?php echo $row['campusName']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="campusID" value="<?php echo $row['campusID']; ?>">
          <p>Are you sure you want to delete this campus?</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle me-1"></i>Cancel</button>
          <button type="submit" name="deleteCampus" class="btn btn-danger"><i class="bi bi-trash me-1"></i>Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
