<?php
if(isset($_POST["login_submit"])) {

  require 'mydb.inc.php';

  $username_email = $_POST["username_email"];
  $password = $_POST["password"];

if(empty($username_email) || empty($password)) {
  header("Location: ../login.php?error=emptyfields");
  exit();
} else {
    $sql = "SELECT * FROM auth_user WHERE username=? OR email=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../login.php?error=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "ss", $username_email, $username_email);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($password, $row['password']);
        if($pwdCheck == false) {
          header("Location: ../login.php?error=wrongpass");
        }
        else if($pwdCheck == true) {
          //Session variable
          session_start();
          $_SESSION['userId'] = $row['user_id'];
          $_SESSION['username'] = $row['username'];

          header("Location: ../index.php?login=success");
        }
      }
      else {
        header("Location: ../login.php?error=nouser");
      }
    }
}

} else {
      header("Location: ../login.php");
}
