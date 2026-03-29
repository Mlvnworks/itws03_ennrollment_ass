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
<title>Role Management</title>
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
<h5 class="mb-0">Role Management</h5>
<div class="ms-auto"><span class="me-3"><i class="bi bi-person-circle"></i> Admin</span></div>
</div>
</nav>

<?php include "messages/messageRole.php"; ?>

<div class="container mt-5">
<div class="d-flex justify-content-between mb-3">
<h3>Role Table</h3>
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoleModal">+ Add Role</button>
</div>

<div class="card shadow-sm">
<div class="card-body">
<table class="table table-bordered table-striped text-center">
<thead class="table-dark">
<tr>
<th>Role Name</th>
<th>Description</th>
<th width="150">Action</th>
</tr>
</thead>
<tbody>
<?php
$result = mysqli_query($conn, "SELECT * FROM role WHERE dateDeleted IS NULL ORDER BY roleID DESC");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['roleName'] . "</td>";
    echo "<td>" . $row['roleDesc'] . "</td>";
    echo '<td>
        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editRoleModal' . $row['roleID'] . '">Edit Role</button>
        <br>
        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRoleModal' . $row['roleID'] . '">Delete Role</button>
    </td>';

    include "modal/roleModalAuth.php";

    echo "</tr>";
}
?>
</tbody>
</table>
</div>
</div>
</div>

<div class="modal fade" id="addRoleModal" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<form method="POST" action="../backend/roleAuth.php">
<div class="modal-header">
<h5 class="modal-title">Add Role</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
<div class="mb-3">
<label class="form-label">Role Name</label>
<input type="text" name="roleName" class="form-control" required>
</div>
<div class="mb-3">
<label class="form-label">Role Description</label>
<input type="text" name="roleDesc" class="form-control" required>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
<button type="submit" name="roleAuth" class="btn btn-primary">Save</button>
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
