<?php
session_start();

//database
require '../includes/mydb.inc.php';

if(isset($_SESSION['user'])) {
  $userId = $_SESSION['userId'];
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form enctype="multipart/form-data" action=""
    method="post">
    <label>Upload Image File:</label>
    <br><br>
    <input name="userImage" type="file" class="inputFile" />
        <br><br>
        <label for="product_name">Product name</label><br>
        <input type="text" name="name">
        <br><br>
        <label for="product_name">Short description</label><br>
        <textarea name="short_description" rows="8" cols="80"></textarea>
        <br><br>
        <label for="product_name">Long description</label><br>
        <textarea name="long_description" rows="8" cols="80"></textarea>
        <br><br>
        <button type="submit" name="button">Submit</button>
</form>
<?php
//Create name, user_id variables

if (count($_FILES) > 0) {
if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
$imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

$sql = "INSERT INTO product(image_type ,image_data, name,short_description,long_description,price,category_id, user_id)
VALUES('{$imageProperties['mime']}', '{$imgData}', 'Shoe','In good condition', 'Bad and boujee',1500,2, $userId)";

$current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
if (isset($current_id)) {
 //  header("Location: listImages.php");
}
}
}
?>
  </body>
</html>
