<?php
require_once 'database.php';
session_start();

if (isset($_POST['loginAuth'])) {
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = $_POST['password'];

    $checkSql = "SELECT * FROM users WHERE email = '$email' AND dateDeleted IS NULL";
    $result = mysqli_query($conn, $checkSql);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($password, $row['password'])) {
        $_SESSION['userID'] = $row['userID'];
        $_SESSION['fullName'] = $row['fullName'];
        header("Location: ../frontend/dashboard.php");
        exit();
    } else {
        header("Location: ../index.php?invalid");
        exit();
    }
}
?>
