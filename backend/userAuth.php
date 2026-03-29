<?php
require_once 'database.php'; //always do this in every page



if(isset($_POST['userAuth'])){
$fullName = mysqli_real_escape_string($conn, trim($_POST['fullName']));
$username = mysqli_real_escape_string($conn, trim($_POST['username']));
$email = mysqli_real_escape_string($conn, trim($_POST['email']));
$password = '12345';

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $result = mysqli_query($conn, "SELECT * FROM users WHERE (fullName = '$fullName' OR username = '$username' OR email = '$email') AND dateDeleted IS NULL");

        if($row = mysqli_fetch_assoc($result)){
             header("Location: ../frontend/user.php?allready");
             exit();
      }else{
  $insertData = "INSERT INTO users SET
      fullName = '$fullName',
      username = '$username',
      email = '$email',
      password = '$hashedPassword'";
      mysqli_query($conn, $insertData);


       header("Location: ../frontend/user.php?savedData");
      
      }

}


if(isset($_POST['updateUser'])){
    $userID = (int) $_POST['userID'];
    $fullName = mysqli_real_escape_string($conn, trim($_POST['fullName']));
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));

    $getCurrent = mysqli_query($conn, "SELECT * FROM users WHERE userID = '$userID'");
    $user = mysqli_fetch_assoc($getCurrent);

    if($user['fullName'] === $fullName && $user['username'] === $username && $user['email'] === $email){
        header("Location: ../frontend/user.php?nothingChanged");
        exit();
    }else{

        $checkDuplicate = mysqli_query($conn, "SELECT * FROM users WHERE (fullName = '$fullName' OR username = '$username' OR email = '$email') AND userID != '$userID' AND dateDeleted IS NULL");
        
        while($row = mysqli_fetch_assoc($checkDuplicate)){
            if($row['fullName'] === $fullName){
                header("Location: ../frontend/user.php?duplicateFullname");  
                exit();
            }
            
            if($row['username'] === $username){
                header("Location: ../frontend/user.php?duplicateUsername");  
                exit();
            }
            
            if($row['email'] === $email){
                header("Location: ../frontend/user.php?duplicateEmail");  
                exit();
            }
        }


        $updateData = "UPDATE users SET
            fullName = '$fullName',
            username = '$username',
            email = '$email'
            WHERE userID = '$userID'";

    mysqli_query($conn, $updateData);
    header("Location: ../frontend/user.php?updated");
    exit();
}
}


if(isset($_POST['deleteUser'])){
    $userID = (int) $_POST['userID'];

    date_default_timezone_set('Asia/Manila');
    $dateDeleted = date('Y-m-d');

    $deleteData = "UPDATE users SET dateDeleted = '$dateDeleted' WHERE userID = '$userID'";

    mysqli_query($conn, $deleteData);
    header("Location: ../frontend/user.php?deleted");
    exit();
}
?>
