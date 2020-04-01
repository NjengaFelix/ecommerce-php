
<?php
if(isset($_POST['logout_submit'])) {
  session_start();
  session_unset();
  session_destroy();

  header("Location: ../login.php");
} else {
  header("Location: ../index.php");
}
