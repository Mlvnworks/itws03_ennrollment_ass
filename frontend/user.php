<?php
require_once '../backend/database.php'; //always do this in every page
session_start();

if(!isset($_SESSION['userID'])){
    header("Location: ../index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User Management</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>

body{
background:#f5f6fa;
}

/* Sidebar */
.sidebar{
height:100vh;
background:#0d6efd;
color:white;
padding-top:20px;
}

.sidebar a{
color:white;
text-decoration:none;
display:block;
padding:10px 20px;
}

.sidebar a:hover{
background:rgba(255,255,255,0.2);
border-radius:5px;
}

.sidebar .submenu{
padding-left:20px;
font-size:14px;
}

/* Top navbar */
.topbar{
background:white;
border-bottom:1px solid #ddd;
}

/* Dashboard cards */
.card-box{
border-radius:10px;
}

</style>
</head>

<body>

<div class="container-fluid">
<div class="row">

<!-- Sidebar -->
<?php
include "nav.php";
?>



<!-- Main Content -->
<div class="col-md-10 p-0">

<!-- Top Navbar -->
<nav class="navbar navbar-expand-lg topbar px-3">
<div class="container-fluid">

<h5 class="mb-0">User Management</h5>

<div class="ms-auto">
<span class="me-3"><i class="bi bi-person-circle"></i> <?php echo htmlspecialchars($_SESSION['fullName'] ?? 'User'); ?></span>
</div>

</div>
</nav>

<?php include "messages/messageUser.php"; ?>

<!-- Dashboard Content -->
<div class="container mt-4">


<div class="container mt-5">

    <div class="d-flex justify-content-between mb-3">
        <h3>User Entity Table</h3>
        <!-- Add Button -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="bi bi-plus-circle me-1"></i>Add User
        </button>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                   $result = mysqli_query($conn, "SELECT * FROM users WHERE dateDeleted is null");
                   while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>" . $row['fullName']. "</td>";
                    echo "<td>" . $row['username']. "</td>";
                    echo "<td>" . $row['email']. "</td>";
                    echo '<td>
                            <div class="d-inline-flex gap-1">
                                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editUserModal' . $row['userID'] . '">
                                    <i class="bi bi-pencil-square me-1"></i>Edit
                                </button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal' . $row['userID'] . '">
                                    <i class="bi bi-trash me-1"></i>Delete
                                </button>
                            </div>
                    </td>';

        
                    include "modal/userModalAuth.php";

                    echo "</tr>";
                   }
                   
                   ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- ADD USER MODAL -->
<div class="modal fade" id="addUserModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST" action="../backend/userAuth.php">
        <div class="modal-header">
          <h5 class="modal-title">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

                <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="fullName" class="form-control" placeholder="Enter full name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter username" required>
            </div>

                <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email address" required>
            </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle me-1"></i>Cancel</button>
          <button type="submit" name="userAuth" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i>Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</div>

</div>

</div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
