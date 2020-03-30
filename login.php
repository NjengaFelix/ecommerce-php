<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Enter login credentials</title>
  </head>
  <body>

    <?php
    if (isset($_GET['error'])) {
      if ($_GET['error'] == "emptyfields") {
        echo '<p class=signuperror>*Fill in all fields!</p>';
      } else if ($_GET['error'] == "wrongpass") {
        echo '<p class=signuperror>*Wrong password!</p>';
      }
    }
     ?>

    <form action="includes/login.inc.php" method="post">
     <label for="username">Username or email</label><br>
     <input type="text" name="username_email">
     <br><br>
     <label for="password">Password</label><br>
     <input type="password" name="password">
     <br><br>
     <button type="submit" name="login_submit">Login</button>
   </form>

   <a href="signup.php">Register account</a>
  </body>
</html>
