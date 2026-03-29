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
            <input type="text" name="campusName" class="form-control" value="<?php echo $row['campusName']; ?>" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="campusAddress" class="form-control" value="<?php echo $row['campusAddress']; ?>" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Campus Head</label>
            <input type="text" name="campusHead" class="form-control" value="<?php echo $row['campusHead']; ?>" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="updateCampus" class="btn btn-primary">Update</button>
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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="deleteCampus" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
