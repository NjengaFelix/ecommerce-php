<?php
session_start();
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <p>Index page</p>
     <?php
     //Logout form
     if(isset($_SESSION['userId'])) {
       echo '<form action="includes/logout.inc.php" method="post">
       <button type = "submit" name="logout-submit">Logout</button>
       </form>';
     } else {
       echo '<a href="login.php">Login</a>';
     }

      ?>
   </body>
 </html>
