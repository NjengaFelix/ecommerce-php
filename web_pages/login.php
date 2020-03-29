<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Enter login credentials</title>
    <style>
    .error {color: #FF0000;}
    </style>
  </head>
  <body>
    <?php
    $usernameErr = $passwordErr = "";
    $username = $password = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["username"])) {
      $usernameErr = "username is required";
    } else {
      $username = test_input($_POST["username"]);
    }

    if(empty($_POST["password"])) {
      $passwordErr = "password is required";
    } else {
      $password = test_input($_POST["password"]);
    }

    //Create a new session

    }

     ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <label for="username">Username</label><br>
      <input type="text" name="username">
      <span class="error">* <?php echo $usernameErr;?></span>
      <br><br>
      <label for="password">Password</label><br>
      <input type="text" name="password">
      <span class="error">* <?php echo $passwordErr;?></span>
      <br><br>
      <input type="submit" name="submit" value="Login">
    </form>
  </body>
</html>
