<?php
require_once 'database.php';

if (isset($_POST['courseAuth'])) {
    $courseCode = mysqli_real_escape_string($conn, trim($_POST['courseCode']));
    $courseName = mysqli_real_escape_string($conn, trim($_POST['courseName']));
    $courseDesc = mysqli_real_escape_string($conn, trim($_POST['courseDesc']));

    $checkDuplicate = mysqli_query($conn, "SELECT * FROM course WHERE (courseCode = '$courseCode' OR courseName = '$courseName') AND dateDeleted IS NULL");

    if (mysqli_fetch_assoc($checkDuplicate)) {
        header("Location: ../frontend/course.php?allready");
        exit();
    }

    $insertData = "INSERT INTO course SET courseCode = '$courseCode', courseName = '$courseName', courseDesc = '$courseDesc'";
    mysqli_query($conn, $insertData);

    header("Location: ../frontend/course.php?savedData");
    exit();
}

if (isset($_POST['updateCourse'])) {
    $courseID = (int) $_POST['courseID'];
    $courseCode = mysqli_real_escape_string($conn, trim($_POST['courseCode']));
    $courseName = mysqli_real_escape_string($conn, trim($_POST['courseName']));
    $courseDesc = mysqli_real_escape_string($conn, trim($_POST['courseDesc']));

    $getCurrent = mysqli_query($conn, "SELECT * FROM course WHERE courseID = '$courseID'");
    $course = mysqli_fetch_assoc($getCurrent);

    if (!$course) {
        header("Location: ../frontend/course.php");
        exit();
    }

    if (
        $course['courseCode'] === $courseCode &&
        $course['courseName'] === $courseName &&
        $course['courseDesc'] === $courseDesc
    ) {
        header("Location: ../frontend/course.php?nothingChanged");
        exit();
    }

    $checkDuplicate = mysqli_query($conn, "SELECT * FROM course WHERE (courseCode = '$courseCode' OR courseName = '$courseName') AND courseID != '$courseID' AND dateDeleted IS NULL");
    if (mysqli_fetch_assoc($checkDuplicate)) {
        header("Location: ../frontend/course.php?duplicate");
        exit();
    }

    $updateData = "UPDATE course SET courseCode = '$courseCode', courseName = '$courseName', courseDesc = '$courseDesc' WHERE courseID = '$courseID'";
    mysqli_query($conn, $updateData);

    header("Location: ../frontend/course.php?updated");
    exit();
}

if (isset($_POST['deleteCourse'])) {
    $courseID = (int) $_POST['courseID'];

    date_default_timezone_set('Asia/Manila');
    $dateDeleted = date('Y-m-d');

    $deleteData = "UPDATE course SET dateDeleted = '$dateDeleted' WHERE courseID = '$courseID'";
    mysqli_query($conn, $deleteData);

    header("Location: ../frontend/course.php?deleted");
    exit();
}
?>
