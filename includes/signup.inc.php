<?php
/**
 *
 */


  if(isset($_POST["signup_submit"])) {

      //database
    require 'mydb.inc.php';

      $uname = $_POST["uname"];
      $gender = $_POST["gender"];
      $email = $_POST["email"];
      $postal_address = $_POST["postal_address"];
      $postal_code = $_POST["postal_code"];
      $phone_NO = $_POST["phone_NO"];
      $username = $_POST["username"];
      $password = $_POST["password"];
      $confirm_password = $_POST["confirm_password"];


    if(empty($uname) || empty($gender) || empty($email) || empty($phone_NO) || empty($username) || empty($password)) {
        header("Location: ../signup.php?error=emptyfields&uname=".$uname."&gender=".$gender."&email=".$email.
        "&postal_address=".$postal_address."&postal_code=".$postal_code."&phone_NO=".$phone_NO."&username=".$username);
        exit();
      } else if(!preg_match("/^[a-zA-Z ]*$/",$uname)) {
        //Only letters and white space allowed
        header("Location: ../signup.php?error=invalidname&gender=".$gender."&email=".$email."&postal_address=".$postal_address.
        "&postal_code=".$postal_code."&phone_NO=".$phone_NO."&username=".$username);
        exit();
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidemail&uname=".$uname."&gender=".$gender.
        "&postal_address=".$postal_address."&postal_code=".$postal_code."&phone_NO=".$phone_NO."&username=".$username);
        exit();
      } elseif (!empty($postal_code) && !preg_match('@[0-9]@', $postal_code)) {
        header("Location: ../signup.php?error=invalidpostalcode&uname=".$uname."&gender=".$gender."&email=".$email.
        "&postal_address=".$postal_address."&phone_NO=".$phone_NO."&username=".$username);
        exit();
      } elseif (!preg_match('@[0-9]@', $phone_NO) || strlen($phone_NO) > 10)  {
        header("Location: ../signup.php?error=invalidphoneNO&uname=".$uname."&gender=".$gender."&email=".$email.
        "&postal_address=".$postal_address."&postal_code=".$postal_code."&username=".$username);
        exit();
      } elseif (!preg_match("/^[a-zA-Z ]*$/",$username)) {
        header("Location: ../signup.php?error=invalidusername&uname=".$uname."&gender=".$gender."&email=".$email.
        "&postal_address=".$postal_address."&postal_code=".$postal_code."&phone_NO=".$phone_NO);
        exit();
      } elseif (!required_password($password)) {
        header("Location: ../signup.php?error=invalidpassword&uname=".$uname."&gender=".$gender."&email=".$email.
        "&postal_address=".$postal_address."&postal_code=".$postal_code."&phone_NO=".$phone_NO."&username=".$username);
        exit();
      } elseif ($password !== $confirm_password) {
        header("Location: ../signup.php?error=passwordcheck&uname=".$uname."&gender=".$gender."&email=".$email.
        "&postal_address=".$postal_address."&postal_code=".$postal_code."&phone_NO=".$phone_NO."&username=".$username);
        exit();
      } else {
        $sql = "SELECT username FROM auth_user where username=?";
        //Connecting to our database through the $conn in mydb.inc.php
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../signup.php?error=sqlerror");
          exit();
        } else {
          mysqli_stmt_bind_param($stmt, "s", $username);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
          $resultCheck = mysqli_stmt_num_rows();
          if($resultCheck > 0) {
            header("Location: ../signup.php?error=usernametaken&uname=".$uname."&gender=".$gender."&email=".$email.
            "&postal_address=".$postal_address."&postal_code=".$postal_code."&phone_NO=".$phone_NO);
            exit();
          } else {
            $sql = "INSERT INTO auth_user(name, gender, email, postal_address, postal_code, phoneNO, username, password)
             VALUES(?,?,?,?,?,?,?,?)";
             $stmt = mysqli_stmt_init($conn);
             if(!mysqli_stmt_prepare($stmt, $sql)) {
               header("Location: ../signup.php?error=sqlerror");
               exit();
             } else {
               $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
              // $membershipdate =  date('Y-m-d H:i:s');

               mysqli_stmt_bind_param($stmt, "ssssssss", $uname, $gender, $email, $postal_address, $postal_code, $phone_NO, $username, $hashedpassword);
               mysqli_stmt_execute($stmt);
               header("Location: ../signup.php?signup=success");
               exit();
             }
          }
        }
      }
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    }  else {
        header("Location: ../signup.php");
    }

    function required_password($reqpassword) {
      // Validate password strength
      $is_password_strong = true;
    $uppercase = preg_match('@[A-Z]@', $reqpassword);
    $lowercase = preg_match('@[a-z]@', $reqpassword);
    $number    = preg_match('@[0-9]@', $reqpassword);
    // $specialChars = preg_match('@[^\w]@', $reqpassword);

    if(!$uppercase || !$lowercase || !$number || strlen($reqpassword) < 8) {
        $is_password_strong = false;
    }else{
        return $is_password_strong = true;
    }
    }
