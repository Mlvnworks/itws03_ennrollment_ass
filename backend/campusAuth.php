<?php
require_once 'database.php';

if (isset($_POST['campusAuth'])) {
    $campusName = mysqli_real_escape_string($conn, trim($_POST['campusName']));
    $campusDesc = mysqli_real_escape_string($conn, trim($_POST['campusDesc']));

    $checkDuplicate = mysqli_query($conn, "SELECT * FROM campus WHERE campusName = '$campusName' AND campusDesc = '$campusDesc' AND dateDeleted IS NULL");

    if (mysqli_fetch_assoc($checkDuplicate)) {
        header("Location: ../frontend/campus.php?allready");
        exit();
    }

    $insertData = "INSERT INTO campus SET campusName = '$campusName', campusDesc = '$campusDesc'";
    mysqli_query($conn, $insertData);

    header("Location: ../frontend/campus.php?savedData");
    exit();
}

if (isset($_POST['updateCampus'])) {
    $campusID = (int) $_POST['campusID'];
    $campusName = mysqli_real_escape_string($conn, trim($_POST['campusName']));
    $campusDesc = mysqli_real_escape_string($conn, trim($_POST['campusDesc']));

    $getCurrent = mysqli_query($conn, "SELECT * FROM campus WHERE campusID = '$campusID'");
    $campus = mysqli_fetch_assoc($getCurrent);

    if (!$campus) {
        header("Location: ../frontend/campus.php");
        exit();
    }

    if (
        $campus['campusName'] === $campusName &&
        $campus['campusDesc'] === $campusDesc
    ) {
        header("Location: ../frontend/campus.php?nothingChanged");
        exit();
    }

    $checkDuplicate = mysqli_query($conn, "SELECT * FROM campus WHERE campusName = '$campusName' AND campusID != '$campusID' AND dateDeleted IS NULL");
    if (mysqli_fetch_assoc($checkDuplicate)) {
        header("Location: ../frontend/campus.php?duplicate");
        exit();
    }

    $updateData = "UPDATE campus SET campusName = '$campusName', campusDesc = '$campusDesc' WHERE campusID = '$campusID'";
    mysqli_query($conn, $updateData);

    header("Location: ../frontend/campus.php?updated");
    exit();
}

if (isset($_POST['deleteCampus'])) {
    $campusID = (int) $_POST['campusID'];

    date_default_timezone_set('Asia/Manila');
    $dateDeleted = date('Y-m-d');

    $deleteData = "UPDATE campus SET dateDeleted = '$dateDeleted' WHERE campusID = '$campusID'";
    mysqli_query($conn, $deleteData);

    header("Location: ../frontend/campus.php?deleted");
    exit();
}
?>
