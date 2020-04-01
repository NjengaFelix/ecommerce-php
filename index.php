<?php
session_start();

//database
require 'includes/mydb.inc.php';

    $sql = "SELECT category_id,name FROM category ORDER BY category_id DESC";
    $result = mysqli_query($conn, $sql);
?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Shop now</title>
     <link rel="stylesheet" href="style.css">
   </head>
   <body>
     <div class="container">

       <div class="topnav">

         <a class="active" href="index.php">Home</a>
         <a href="product.php">Products</a>
         <a href="#contact">Contact</a>
         <a href="#about">About</a>
         <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
         <span class="logoutbtn">
           <?php
           //Logout form
           if(isset($_SESSION['userId'])) {
             echo '<form action="includes/logout.inc.php" method="post">
             <button type = "submit" name="logout_submit">Logout</button>
             </form>';
           } else {
             echo '<a href="login.php">Login</a>';
           }

            ?>
         </span>

       </div>

       <div class="main">
         <div class="category_container">
<?php
	while($row = mysqli_fetch_array($result)) {
	?>

          <form class="category_card" method="post" action= "includes/category.inc.php">
            <a href="product.php?cat_id=<?php echo $row["category_id"]; ?>"><img src="includes/category.inc.php?category_id=<?php echo $row["category_id"]; ?>" width="400"/></a>
            <p><h1><?php echo $row["name"]; ?></h1></p>
         </form>

<?php
	}
    mysqli_close($conn);
?>

      </div>
       </div>

     </div>


     <div class="footer">

     </div>


   </body>
 </html>
