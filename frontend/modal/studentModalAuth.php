<div class="modal fade" id="editStudentModal<?php echo $row['studentID']; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="../backend/studentAuth.php">
        <div class="modal-header">
          <h5 class="modal-title">Edit Student | <?php echo $row['fullName']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="studentID" value="<?php echo $row['studentID']; ?>">

          <div class="mb-3">
            <label class="form-label">Student Number</label>
            <input type="text" name="studentNo" class="form-control" value="<?php echo $row['studentNo']; ?>" placeholder="Enter student number" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="fullName" class="form-control" value="<?php echo $row['fullName']; ?>" placeholder="Enter full name" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" placeholder="Enter email address" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Year Level</label>
            <input type="text" name="yearLevel" class="form-control" value="<?php echo $row['yearLevel']; ?>" placeholder="Enter year level" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle me-1"></i>Cancel</button>
          <button type="submit" name="updateStudent" class="btn btn-primary"><i class="bi bi-save me-1"></i>Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteStudentModal<?php echo $row['studentID']; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="../backend/studentAuth.php">
        <div class="modal-header">
          <h5 class="modal-title">Delete Student | <?php echo $row['fullName']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="studentID" value="<?php echo $row['studentID']; ?>">
          <p>Are you sure you want to delete this student?</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle me-1"></i>Cancel</button>
          <button type="submit" name="deleteStudent" class="btn btn-danger"><i class="bi bi-trash me-1"></i>Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
