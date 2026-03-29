<?php
require_once 'database.php';

if (isset($_POST['enrollmentAuth'])) {
    $enrollmentNo = mysqli_real_escape_string($conn, trim($_POST['enrollmentNo']));
    $studentName = mysqli_real_escape_string($conn, trim($_POST['studentName']));
    $courseName = mysqli_real_escape_string($conn, trim($_POST['courseName']));
    $campusName = mysqli_real_escape_string($conn, trim($_POST['campusName']));
    $status = mysqli_real_escape_string($conn, trim($_POST['status']));

    $checkDuplicate = mysqli_query($conn, "SELECT * FROM enrollment WHERE enrollmentNo = '$enrollmentNo' AND dateDeleted IS NULL");

    if (mysqli_fetch_assoc($checkDuplicate)) {
        header("Location: ../frontend/enrollment.php?allready");
        exit();
    }

    $insertData = "INSERT INTO enrollment SET enrollmentNo = '$enrollmentNo', studentName = '$studentName', courseName = '$courseName', campusName = '$campusName', status = '$status'";
    mysqli_query($conn, $insertData);

    header("Location: ../frontend/enrollment.php?savedData");
    exit();
}

if (isset($_POST['updateEnrollment'])) {
    $enrollmentID = (int) $_POST['enrollmentID'];
    $enrollmentNo = mysqli_real_escape_string($conn, trim($_POST['enrollmentNo']));
    $studentName = mysqli_real_escape_string($conn, trim($_POST['studentName']));
    $courseName = mysqli_real_escape_string($conn, trim($_POST['courseName']));
    $campusName = mysqli_real_escape_string($conn, trim($_POST['campusName']));
    $status = mysqli_real_escape_string($conn, trim($_POST['status']));

    $getCurrent = mysqli_query($conn, "SELECT * FROM enrollment WHERE enrollmentID = '$enrollmentID'");
    $enrollment = mysqli_fetch_assoc($getCurrent);

    if (!$enrollment) {
        header("Location: ../frontend/enrollment.php");
        exit();
    }

    if (
        $enrollment['enrollmentNo'] === $enrollmentNo &&
        $enrollment['studentName'] === $studentName &&
        $enrollment['courseName'] === $courseName &&
        $enrollment['campusName'] === $campusName &&
        $enrollment['status'] === $status
    ) {
        header("Location: ../frontend/enrollment.php?nothingChanged");
        exit();
    }

    $checkDuplicate = mysqli_query($conn, "SELECT * FROM enrollment WHERE enrollmentNo = '$enrollmentNo' AND enrollmentID != '$enrollmentID' AND dateDeleted IS NULL");
    if (mysqli_fetch_assoc($checkDuplicate)) {
        header("Location: ../frontend/enrollment.php?duplicate");
        exit();
    }

    $updateData = "UPDATE enrollment SET enrollmentNo = '$enrollmentNo', studentName = '$studentName', courseName = '$courseName', campusName = '$campusName', status = '$status' WHERE enrollmentID = '$enrollmentID'";
    mysqli_query($conn, $updateData);

    header("Location: ../frontend/enrollment.php?updated");
    exit();
}

if (isset($_POST['deleteEnrollment'])) {
    $enrollmentID = (int) $_POST['enrollmentID'];

    date_default_timezone_set('Asia/Manila');
    $dateDeleted = date('Y-m-d');

    $deleteData = "UPDATE enrollment SET dateDeleted = '$dateDeleted' WHERE enrollmentID = '$enrollmentID'";
    mysqli_query($conn, $deleteData);

    header("Location: ../frontend/enrollment.php?deleted");
    exit();
}
?>
