<?php
require_once '../backend/database.php';
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: ../index.php");
    exit();
}

$usersCount = mysqli_num_rows(mysqli_query($conn, "SELECT userID FROM users WHERE dateDeleted IS NULL"));
$rolesCount = mysqli_num_rows(mysqli_query($conn, "SELECT roleID FROM role WHERE dateDeleted IS NULL"));
$courseCount = mysqli_num_rows(mysqli_query($conn, "SELECT courseID FROM course WHERE dateDeleted IS NULL"));
$campusCount = mysqli_num_rows(mysqli_query($conn, "SELECT campusID FROM campus WHERE dateDeleted IS NULL"));
$studentsCount = mysqli_num_rows(mysqli_query($conn, "SELECT studentID FROM students WHERE dateDeleted IS NULL"));
$enrollmentCount = mysqli_num_rows(mysqli_query($conn, "SELECT enrollmentID FROM enrollment WHERE dateDeleted IS NULL"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Enrollment System Dashboard</title>
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
.card-box{border-radius:10px;}
</style>
</head>
<body>
<div class="container-fluid">
<div class="row">
<?php include "nav.php"; ?>
<div class="col-md-10 p-0">

<nav class="navbar navbar-expand-lg topbar px-3">
<div class="container-fluid">
<h5 class="mb-0">Dashboard</h5>
<div class="ms-auto"><span class="me-3"><i class="bi bi-person-circle"></i> Admin</span></div>
</div>
</nav>

<div class="container mt-4">
<h4>Enrollment System Dashboard</h4>
<p class="text-muted">Welcome to the Student Enrollment Management System.</p>

<div class="row mt-4 g-3">
<div class="col-md-4">
<div class="card shadow card-box p-3 text-center">
<i class="bi bi-person fs-1 text-primary"></i>
<h5 class="mt-2">Users</h5>
<p class="mb-0"><?php echo $usersCount; ?> Active Users</p>
</div>
</div>

<div class="col-md-4">
<div class="card shadow card-box p-3 text-center">
<i class="bi bi-person-badge fs-1 text-secondary"></i>
<h5 class="mt-2">Roles</h5>
<p class="mb-0"><?php echo $rolesCount; ?> Roles</p>
</div>
</div>

<div class="col-md-4">
<div class="card shadow card-box p-3 text-center">
<i class="bi bi-journal-bookmark fs-1 text-success"></i>
<h5 class="mt-2">Courses</h5>
<p class="mb-0"><?php echo $courseCount; ?> Courses</p>
</div>
</div>

<div class="col-md-4">
<div class="card shadow card-box p-3 text-center">
<i class="bi bi-building fs-1 text-warning"></i>
<h5 class="mt-2">Campus</h5>
<p class="mb-0"><?php echo $campusCount; ?> Campuses</p>
</div>
</div>

<div class="col-md-4">
<div class="card shadow card-box p-3 text-center">
<i class="bi bi-people fs-1 text-info"></i>
<h5 class="mt-2">Students</h5>
<p class="mb-0"><?php echo $studentsCount; ?> Students</p>
</div>
</div>

<div class="col-md-4">
<div class="card shadow card-box p-3 text-center">
<i class="bi bi-pencil-square fs-1 text-danger"></i>
<h5 class="mt-2">Enrollments</h5>
<p class="mb-0"><?php echo $enrollmentCount; ?> Enrollments</p>
</div>
</div>
</div>
</div>

</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
