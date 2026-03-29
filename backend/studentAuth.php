<?php
require_once 'database.php';

if (isset($_POST['studentAuth'])) {
    $studentNo = mysqli_real_escape_string($conn, trim($_POST['studentNo']));
    $fullName = mysqli_real_escape_string($conn, trim($_POST['fullName']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $yearLevel = mysqli_real_escape_string($conn, trim($_POST['yearLevel']));

    $checkDuplicate = mysqli_query($conn, "SELECT * FROM students WHERE (studentNo = '$studentNo' OR email = '$email') AND dateDeleted IS NULL");

    if (mysqli_fetch_assoc($checkDuplicate)) {
        header("Location: ../frontend/students.php?allready");
        exit();
    }

    $insertData = "INSERT INTO students SET studentNo = '$studentNo', fullName = '$fullName', email = '$email', yearLevel = '$yearLevel'";
    mysqli_query($conn, $insertData);

    header("Location: ../frontend/students.php?savedData");
    exit();
}

if (isset($_POST['updateStudent'])) {
    $studentID = (int) $_POST['studentID'];
    $studentNo = mysqli_real_escape_string($conn, trim($_POST['studentNo']));
    $fullName = mysqli_real_escape_string($conn, trim($_POST['fullName']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $yearLevel = mysqli_real_escape_string($conn, trim($_POST['yearLevel']));

    $getCurrent = mysqli_query($conn, "SELECT * FROM students WHERE studentID = '$studentID'");
    $student = mysqli_fetch_assoc($getCurrent);

    if (!$student) {
        header("Location: ../frontend/students.php");
        exit();
    }

    if (
        $student['studentNo'] === $studentNo &&
        $student['fullName'] === $fullName &&
        $student['email'] === $email &&
        $student['yearLevel'] === $yearLevel
    ) {
        header("Location: ../frontend/students.php?nothingChanged");
        exit();
    }

    $checkDuplicate = mysqli_query($conn, "SELECT * FROM students WHERE (studentNo = '$studentNo' OR email = '$email') AND studentID != '$studentID' AND dateDeleted IS NULL");
    if (mysqli_fetch_assoc($checkDuplicate)) {
        header("Location: ../frontend/students.php?duplicate");
        exit();
    }

    $updateData = "UPDATE students SET studentNo = '$studentNo', fullName = '$fullName', email = '$email', yearLevel = '$yearLevel' WHERE studentID = '$studentID'";
    mysqli_query($conn, $updateData);

    header("Location: ../frontend/students.php?updated");
    exit();
}

if (isset($_POST['deleteStudent'])) {
    $studentID = (int) $_POST['studentID'];

    date_default_timezone_set('Asia/Manila');
    $dateDeleted = date('Y-m-d');

    $deleteData = "UPDATE students SET dateDeleted = '$dateDeleted' WHERE studentID = '$studentID'";
    mysqli_query($conn, $deleteData);

    header("Location: ../frontend/students.php?deleted");
    exit();
}
?>
