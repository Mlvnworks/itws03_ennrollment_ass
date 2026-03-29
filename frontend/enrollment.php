<?php
require_once '../backend/database.php';
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Enrollment Management</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
body{background:#f5f6fa;}
.sidebar{height:100vh;background:#0d6efd;color:white;padding-top:20px;}
.sidebar a{color:white;text-decoration:none;display:block;padding:10px 20px;}
.sidebar a:hover{background:rgba(255,255,255,0.2);border-radius:5px;}
.sidebar .submenu{padding-left:20px;font-size:14px;}
.topbar{background:white;border-bottom:1px solid #ddd;}
</style>
</head>
<body>
<div class="container-fluid">
<div class="row">
<?php include "nav.php"; ?>
<div class="col-md-10 p-0">

<nav class="navbar navbar-expand-lg topbar px-3">
<div class="container-fluid">
<h5 class="mb-0">Enrollment Management</h5>
<div class="ms-auto"><span class="me-3"><i class="bi bi-person-circle"></i> Admin</span></div>
</div>
</nav>

<?php include "messages/messageEnrollment.php"; ?>

<div class="container mt-5">
<div class="d-flex justify-content-between mb-3">
<h3>Enrollment Table</h3>
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEnrollmentModal"><i class="bi bi-plus-circle me-1"></i>Add Enrollment</button>
</div>

<div class="card shadow-sm">
<div class="card-body">
<table class="table table-bordered table-striped text-center">
<thead class="table-dark">
<tr>
<th>Enrollment No.</th>
<th>Student Name</th>
<th>Course</th>
<th>Campus</th>
<th>Status</th>
<th width="150">Action</th>
</tr>
</thead>
<tbody>
<?php
$result = mysqli_query($conn, "SELECT * FROM enrollment WHERE dateDeleted IS NULL ORDER BY enrollmentID DESC");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['enrollmentNo'] . "</td>";
    echo "<td>" . $row['studentName'] . "</td>";
    echo "<td>" . $row['courseName'] . "</td>";
    echo "<td>" . $row['campusName'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo '<td>
        <div class="d-inline-flex gap-1">
            <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editEnrollmentModal' . $row['enrollmentID'] . '"><i class="bi bi-pencil-square me-1"></i>Edit</button>
            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteEnrollmentModal' . $row['enrollmentID'] . '"><i class="bi bi-trash me-1"></i>Delete</button>
        </div>
    </td>';

    include "modal/enrollmentModalAuth.php";

    echo "</tr>";
}
?>
</tbody>
</table>
</div>
</div>
</div>

<div class="modal fade" id="addEnrollmentModal" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<form method="POST" action="../backend/enrollmentAuth.php">
<div class="modal-header">
<h5 class="modal-title">Add Enrollment</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
<div class="mb-3">
<label class="form-label">Enrollment Number</label>
<input type="text" name="enrollmentNo" class="form-control" placeholder="Enter enrollment number" required>
</div>
<div class="mb-3">
<label class="form-label">Student Name</label>
<input type="text" name="studentName" class="form-control" placeholder="Enter student name" required>
</div>
<div class="mb-3">
<label class="form-label">Course Name</label>
<input type="text" name="courseName" class="form-control" placeholder="Enter course name" required>
</div>
<div class="mb-3">
<label class="form-label">Campus Name</label>
<input type="text" name="campusName" class="form-control" placeholder="Enter campus name" required>
</div>
<div class="mb-3">
<label class="form-label">Status</label>
<select name="status" class="form-control" required>
<option value="" disabled selected>Select enrollment status</option>
<option value="Pending">Pending</option>
<option value="Enrolled">Enrolled</option>
<option value="Cancelled">Cancelled</option>
</select>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle me-1"></i>Cancel</button>
<button type="submit" name="enrollmentAuth" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i>Save</button>
</div>
</form>
</div>
</div>
</div>

</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
