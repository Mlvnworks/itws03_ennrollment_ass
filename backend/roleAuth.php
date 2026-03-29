<?php
require_once 'database.php';

if (isset($_POST['roleAuth'])) {
    $roleName = mysqli_real_escape_string($conn, trim($_POST['roleName']));
    $roleDesc = mysqli_real_escape_string($conn, trim($_POST['roleDesc']));

    $checkDuplicate = mysqli_query($conn, "SELECT * FROM role WHERE roleName = '$roleName' AND dateDeleted IS NULL");

    if (mysqli_fetch_assoc($checkDuplicate)) {
        header("Location: ../frontend/role.php?allready");
        exit();
    }

    $insertData = "INSERT INTO role SET roleName = '$roleName', roleDesc = '$roleDesc'";
    mysqli_query($conn, $insertData);

    header("Location: ../frontend/role.php?savedData");
    exit();
}

if (isset($_POST['updateRole'])) {
    $roleID = (int) $_POST['roleID'];
    $roleName = mysqli_real_escape_string($conn, trim($_POST['roleName']));
    $roleDesc = mysqli_real_escape_string($conn, trim($_POST['roleDesc']));

    $getCurrent = mysqli_query($conn, "SELECT * FROM role WHERE roleID = '$roleID'");
    $role = mysqli_fetch_assoc($getCurrent);

    if (!$role) {
        header("Location: ../frontend/role.php");
        exit();
    }

    if ($role['roleName'] === $roleName && $role['roleDesc'] === $roleDesc) {
        header("Location: ../frontend/role.php?nothingChanged");
        exit();
    }

    $checkDuplicate = mysqli_query($conn, "SELECT * FROM role WHERE roleName = '$roleName' AND roleID != '$roleID' AND dateDeleted IS NULL");
    if (mysqli_fetch_assoc($checkDuplicate)) {
        header("Location: ../frontend/role.php?duplicate");
        exit();
    }

    $updateData = "UPDATE role SET roleName = '$roleName', roleDesc = '$roleDesc' WHERE roleID = '$roleID'";
    mysqli_query($conn, $updateData);

    header("Location: ../frontend/role.php?updated");
    exit();
}

if (isset($_POST['deleteRole'])) {
    $roleID = (int) $_POST['roleID'];

    date_default_timezone_set('Asia/Manila');
    $dateDeleted = date('Y-m-d');

    $deleteData = "UPDATE role SET dateDeleted = '$dateDeleted' WHERE roleID = '$roleID'";
    mysqli_query($conn, $deleteData);

    header("Location: ../frontend/role.php?deleted");
    exit();
}
?>
