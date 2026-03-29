<div class="modal fade" id="editCourseModal<?php echo $row['courseID']; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="../backend/courseAuth.php">
        <div class="modal-header">
          <h5 class="modal-title">Edit Course | <?php echo $row['courseName']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="courseID" value="<?php echo $row['courseID']; ?>">

          <div class="mb-3">
            <label class="form-label">Course Code</label>
            <input type="text" name="courseCode" class="form-control" value="<?php echo $row['courseCode']; ?>" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Course Name</label>
            <input type="text" name="courseName" class="form-control" value="<?php echo $row['courseName']; ?>" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Course Description</label>
            <input type="text" name="courseDesc" class="form-control" value="<?php echo $row['courseDesc']; ?>" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="updateCourse" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteCourseModal<?php echo $row['courseID']; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="../backend/courseAuth.php">
        <div class="modal-header">
          <h5 class="modal-title">Delete Course | <?php echo $row['courseName']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="courseID" value="<?php echo $row['courseID']; ?>">
          <p>Are you sure you want to delete this course?</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="deleteCourse" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
