<!DOCTYPE html>
<html>
<head>
<title>Create an account</title>
</head>
<body>
  <!-- Form required -->
  <?php
  if(isset($_GET['error'])) {
    if($_GET['error'] == "emptyfields") {
      echo '<p class=signuperror>*Fill in all fields!</p>';
    } else if($_GET['error'] == "invalidname") {
      echo '<p class=signuperror>*Invalid name!</p>';
    }  else if($_GET['error'] == "invalidemail") {
      echo '<p class=signuperror>*Invalid email!</p>';
    } else if($_GET['error'] == "invalidpostalcode") {
      echo '<p class=signuperror>*Invalid postal code!</p>';
    } else if($_GET['error'] == "invalidphoneNO") {
      echo '<p class=signuperror>*Invalid phone number!</p>';
    } else if($_GET['error'] == "invalidusername") {
      echo '<p class=signuperror>*Invalid Username!</p>';
    } else if($_GET['error'] == "invalidpassword") {
      echo '<p class=signuperror>*Invalid password!</p>';
    } else if($_GET['error'] == "passwordcheck") {
      echo '<p class=signuperror>*Confirm password again!</p>';
    } else if($_GET['error'] == "sqlerror") {
      echo '<p class=signuperror>*SQL:Failed to create user!</p>';
    }
  } else if (isset($_GET['signup']) == "success") {
    header("Location: login.php");
  }
   ?>
<form method="post" action="../includes/signupadmin.inc.php">
  <label for="uname">Name</label><br>
  <input type="text" name="uname">
  <br><br>
  <label for="gender">Gender</label><br>
  <input type="radio" name="gender" value="Male">Male
  <input type="radio" name="gender" value="Female">Female
  <br><br>
  <label for="email">Email</label><br>
  <input type="text" name="email">
  <br><br>
  <label for="postal_address">Postal address</label><br>
  <input type="text" name="postal_address" placeholder="optional">
  <br><br>
  <label for="postal_code">Postal code</label><br>
  <input type="text" name="postal_code" placeholder="optional">
  <br><br>
  <label for="phone_NO">Phone number</label><br>
  <input type="text" name="phone_NO">
  <br><br>
  <label for="username">Username</label><br>
  <input type="text" name="username">
  <br><br>
  <label for="password">Password</label><br>
  <input type="password" name="password">
  <br><br>
  <label for="confirm_password">Confirm password</label><br>
  <input type="password" name="confirm_password">
  <br><br>
  <button type="submit" name="signup_submit">Sign up</button>
</form>
</body>


</html>
