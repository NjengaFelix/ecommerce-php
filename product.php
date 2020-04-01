<?php
session_start();

//database
require 'includes/mydb.inc.php';

    $sql = "SELECT * FROM product WHERE category_id=" . $_GET['cat_id'];
    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Products</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="main">
      <?php
      	while($row = mysqli_fetch_array($result)) {
      	?>
        <div class="product_container">
                <form class="product_card" method="post" action= "">
                  <img src="includes/products.inc.php?product_id=<?php echo $row["product_id"]; ?>" width="300">
                  <h1><?php echo $row["name"]; ?></h1>
                  <p class="price"><?php echo $row["price"]; ?></p>
                  <p><?php echo $row["short_description"]; ?></p>
                  <p><button type="submit" name="add_to_cart">Add to cart</button></p>
               </form>
             </div>
      <?php
      	}
          mysqli_close($conn);
      ?>


    </div>
  </body>
</html>
