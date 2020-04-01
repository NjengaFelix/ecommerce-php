<?php
session_start();

//database
require 'includes/mydb.inc.php';

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
    <label>Upload Image File:</label><br /> <input name="userImage"
        type="file" class="inputFile" /> <input type="submit"
        value="Submit" class="btnSubmit" />
</form>
<?php
//Create name, user_id variables

if (count($_FILES) > 0) {
if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
$imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

$sql = "INSERT INTO category(image_type ,image_data, name, user_id)
VALUES('{$imageProperties['mime']}', '{$imgData}', 'Shoes', 6)";

$current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
if (isset($current_id)) {
 //  header("Location: listImages.php");
}
}
}
?>
  </body>
</html>
