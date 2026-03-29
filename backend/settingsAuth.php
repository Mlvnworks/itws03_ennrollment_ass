<?php
require_once 'database.php';

if (isset($_POST['saveSettings'])) {
    $schoolName = mysqli_real_escape_string($conn, trim($_POST['schoolName']));
    $schoolEmail = mysqli_real_escape_string($conn, trim($_POST['schoolEmail']));
    $schoolPhone = mysqli_real_escape_string($conn, trim($_POST['schoolPhone']));
    $schoolAddress = mysqli_real_escape_string($conn, trim($_POST['schoolAddress']));

    $checkData = mysqli_query($conn, "SELECT * FROM settings WHERE settingsID = 1 AND dateDeleted IS NULL");

    if ($row = mysqli_fetch_assoc($checkData)) {
        if (
            $row['schoolName'] === $schoolName &&
            $row['schoolEmail'] === $schoolEmail &&
            $row['schoolPhone'] === $schoolPhone &&
            $row['schoolAddress'] === $schoolAddress
        ) {
            header("Location: ../frontend/settings.php?nothingChanged");
            exit();
        }

        $updateData = "UPDATE settings SET schoolName = '$schoolName', schoolEmail = '$schoolEmail', schoolPhone = '$schoolPhone', schoolAddress = '$schoolAddress' WHERE settingsID = 1";
        mysqli_query($conn, $updateData);
        header("Location: ../frontend/settings.php?updated");
        exit();
    }

    $insertData = "INSERT INTO settings SET settingsID = 1, schoolName = '$schoolName', schoolEmail = '$schoolEmail', schoolPhone = '$schoolPhone', schoolAddress = '$schoolAddress'";
    mysqli_query($conn, $insertData);

    header("Location: ../frontend/settings.php?savedData");
    exit();
}
?>
