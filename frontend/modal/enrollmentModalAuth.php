<div class="modal fade" id="editEnrollmentModal<?php echo $row['enrollmentID']; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="../backend/enrollmentAuth.php">
        <div class="modal-header">
          <h5 class="modal-title">Edit Enrollment | <?php echo $row['enrollmentNo']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="enrollmentID" value="<?php echo $row['enrollmentID']; ?>">

          <div class="mb-3">
            <label class="form-label">Enrollment Number</label>
            <input type="text" name="enrollmentNo" class="form-control" value="<?php echo $row['enrollmentNo']; ?>" placeholder="Enter enrollment number" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Student Name</label>
            <input type="text" name="studentName" class="form-control" value="<?php echo $row['studentName']; ?>" placeholder="Enter student name" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Course Name</label>
            <input type="text" name="courseName" class="form-control" value="<?php echo $row['courseName']; ?>" placeholder="Enter course name" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Campus Name</label>
            <input type="text" name="campusName" class="form-control" value="<?php echo $row['campusName']; ?>" placeholder="Enter campus name" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
              <option value="Pending" <?php echo $row['status'] === 'Pending' ? 'selected' : ''; ?>>Pending</option>
              <option value="Enrolled" <?php echo $row['status'] === 'Enrolled' ? 'selected' : ''; ?>>Enrolled</option>
              <option value="Cancelled" <?php echo $row['status'] === 'Cancelled' ? 'selected' : ''; ?>>Cancelled</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle me-1"></i>Cancel</button>
          <button type="submit" name="updateEnrollment" class="btn btn-primary"><i class="bi bi-save me-1"></i>Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteEnrollmentModal<?php echo $row['enrollmentID']; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="../backend/enrollmentAuth.php">
        <div class="modal-header">
          <h5 class="modal-title">Delete Enrollment | <?php echo $row['enrollmentNo']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="enrollmentID" value="<?php echo $row['enrollmentID']; ?>">
          <p>Are you sure you want to delete this enrollment?</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle me-1"></i>Cancel</button>
          <button type="submit" name="deleteEnrollment" class="btn btn-danger"><i class="bi bi-trash me-1"></i>Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
