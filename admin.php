<?php
session_start();
//Only super_user and editor groups are allowed to login
if(!isset($_SESSION['userId']) && isset($_SESSION['group_id']) == 3) {
  header("Location: login.php");
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- A custom page for adding products -->
    <title>Admin</title>
    <style>

    .sidenav {
      height: 100%;
      width: 180px;
      position: fixed;
      z-index: 1; /* Stay on top */
      top: 50px;
      left: 0;
      background-color: #111; /* Black */
      overflow-x: hidden; /* Disable horizontal scroll y-Vertical scroll*/
      padding-top: 10px;
      transition: 0.5s;
    }

    .sidenav a {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 20px;
      color: #818181;
      display: block;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .sidenav a.active{
      color: #f1f1f1;
      background-color: #4CAF50; /*Light green*/
    }

    .sidenav span{
  font-size:30px;
  cursor:pointer;
  display: none;
}



  .section {
    padding-left: 20px;
    display: block;
    height: 100%;
    width: 340px;
    position: fixed;
    z-index: 1; /* Stay on top */
    top: 50px;
    right: 0;
    background-color: rgba(0, 0, 0, 0.4); /* black */
    overflow-x: hidden; /* Disable horizontal scroll y-Vertical scroll*/
    padding-top: 10px;
    transition: 0.5s;
  }

  label {
    font-size: 20px;
  }

  input[name = txtProductName] {
    width: 300px;
  }

  table {
    margin: 20px;
  }

  table, th, td {
  border: 1px solid black;
}

.image_section {

}

  </style>
  </head>

  <body>
    <!-- A bootstrap vertical navigation bar -->
    <div class="container_fluid">
      <div class="topnav">
        <span class="menubar" onclick="toggleNav()">&#9776;</span>
      </div>
      <div id="mySidenav" class="sidenav">
        <!-- <a href="#" class="fa fa-fw fa-home">Home</a> -->
        <a href="#">Dashboard</a>
        <a href="admin/new_product.php" class="active">New product</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
      </div>

      <div class="main">

    </div>

    <script type="text/javascript">

      function toggleNav() {
        // sidenav overlay
        var sidenav = document.getElementById("mySidenav");
        var main = document.getElementById("main");
        if(sidenav.style.display === "none") {
          sidenav.style.display = "block";
          //main.style.margin-left = "160px";
        }else {
          sidenav.style.display = "none";
          //main.style.margin-left = "0px";
        }
      }

    </script>





  </body>
</html>
