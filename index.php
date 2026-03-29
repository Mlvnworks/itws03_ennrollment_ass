<?php
session_start();

if(isset($_SESSION['userID'])){
  header("Location: ./frontend/dashboard.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg,#4e73df,#1cc88a);
}

.login-card{
    width:380px;
    border-radius:15px;
}

.logo{
    width:70px;
}

.brand-title{
    font-weight:600;
    letter-spacing:1px;
}
</style>

</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">

<div class="card login-card shadow-lg p-4">

<div class="text-center mb-3">

<img src="https://media.istockphoto.com/id/1171617683/vector/education-symbol-design-template-pencil-and-book-icon-stylized.jpg?s=612x612&w=0&k=20&c=DrQKLkTfyQ512yTZlhvhrwFVVEPTcq3BHKN68anvGb4="
     width="90" class="mb-2">

<h5 class="fw-bold">School Portal</h5>
<p class="text-muted small">Internation School (Demo  Only)</p>

</div>
<?php
if(isset($_GET['invalid'])){
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error!</strong> Wrong Email or Password.
<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php
}
?>

<form action="./backend/loginAuth.php" method="POST">

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control" placeholder="Enter your email" required>
</div>

<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" name="password" class="form-control" placeholder="Enter password" required>
</div>

<div class="d-grid mb-3">
<button type="submit" name="loginAuth" class="btn btn-primary">Login</button>
</div>

<div class="text-center">
<small class="text-muted">Don't have an account? <a href="#">Register</a></small>
</div>

</form>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>