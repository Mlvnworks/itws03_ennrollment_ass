<?php
require_once '../backend/database.php';
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: ../index.php");
    exit();
}

$settings = mysqli_query($conn, "SELECT * FROM settings WHERE settingsID = 1 AND dateDeleted IS NULL");
$row = mysqli_fetch_assoc($settings);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>System Settings</title>
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
<h5 class="mb-0">System Settings</h5>
<div class="ms-auto"><span class="me-3"><i class="bi bi-person-circle"></i> Admin</span></div>
</div>
</nav>

<?php include "messages/messageSettings.php"; ?>

<div class="container mt-5">
<div class="card shadow-sm">
<div class="card-header bg-primary text-white">School Information</div>
<div class="card-body">
<form method="POST" action="../backend/settingsAuth.php">
<div class="mb-3">
<label class="form-label">School Name</label>
<input type="text" name="schoolName" class="form-control" value="<?php echo isset($row['schoolName']) ? $row['schoolName'] : ''; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">School Email</label>
<input type="email" name="schoolEmail" class="form-control" value="<?php echo isset($row['schoolEmail']) ? $row['schoolEmail'] : ''; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">School Phone</label>
<input type="text" name="schoolPhone" class="form-control" value="<?php echo isset($row['schoolPhone']) ? $row['schoolPhone'] : ''; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">School Address</label>
<textarea name="schoolAddress" class="form-control" rows="3" required><?php echo isset($row['schoolAddress']) ? $row['schoolAddress'] : ''; ?></textarea>
</div>

<button type="submit" name="saveSettings" class="btn btn-primary">Save Settings</button>
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
