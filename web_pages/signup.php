<!DOCTYPE html>
<html>
<head>
<title>Create an account</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
  <!-- Form required -->
  <?php
  $unameErr = $genderErr = $emailErr = $postal_addressErr = $postal_codeErr = $phone_NOErr = $usernameErr
  = $passwordErr = "";
  $uname = $gender = $email = $postal_address = $postal_code = $username = $password = "";
  $phone_NO;

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["uname"])) {
      $unameErr = "Name is required";
    } else if (empty($_POST["uname"]) && !is_letter($_POST["uname"])) {
      $unameErr = "Only letters and white space allowed";
    } else {
      $uname = test_input($_POST["uname"]);
    }

    if(empty($_POST["gender"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = test_input($_POST["gender"]);
    }

    if(empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else if (!empty($_POST["email"]) && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    } else {
      $email = test_input($_POST["email"]);
    }

    if(!is_number($_POST["postal_code"])) {
      $postal_codeErr = "Input numbers only";
    } else {
      $postal_code = test_input($_POST["postal_code"]);
    }

    if(empty($_POST["phone_NO"])) {
      $phone_NOErr = "Phone number is required";
    } else if(!empty($_POST["phone_NO"]) && !required_phone_NO($_POST["phone_NO"])) {
      $phone_NOErr = "Invalid phone number";
    } else {
      $phone_NO = test_input($_POST["phone_NO"]);
    }

    if(empty($_POST["username"])) {
      $usernameErr = "User name is required";
    } else {
      $username = test_input($_POST["username"]);
    }

    if(empty($_POST["password"])) {
      $passwordErr = "Password is required";
    } else if(!empty($_POST["password"]) && !required_password($_POST["password"])) {
      $passwordErr = "Password should be at least 8 characters in length, should include at least one upper case letter and one number.";
    } else {
      $password = test_input($_POST["password"]);
    }


  }

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function is_letter($reqletter) {
  $is_letter = false;
  if (preg_match("/^[a-zA-Z ]*$/",$reqletter)) {
  $is_letter = true;
} else {
  return $is_letter = false;
}
}

function is_number($reqnumber) {
  $is_number = false;
  $number = preg_match('@[0-9]@', $reqnumber);
  if($number) {
    $is_number = true;
  } else {
    $is_number = false;
  }
}

function required_phone_NO($reqPhoneNO) {
  $is_phoneNO = true;
  $number = preg_match('@[0-9]@', $reqPhoneNO);
  if(!$number || strlen($reqPhoneNO) < 10) {
    $is_phoneNO = false;
  } else {
    return $is_phoneNO = true;
  }
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

   ?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="uname">Name</label><br>
  <input type="name" name="uname">
  <span class="error">* <?php echo $unameErr;?></span>
  <br><br>
  <label for="gender">Gender</label><br>
  <input type="radio" name="gender" value="Male">Male
  <input type="radio" name="gender" value="Female">Female
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <label for="email">Email</label><br>
  <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <label for="postal_address">Postal address</label><br>
  <input type="text" name="postal_address" placeholder="optional">
  <br><br>
  <label for="postal_code">Postal code</label><br>
  <input type="text" name="postal_code" placeholder="optional">
  <span class="error"><?php echo $postal_codeErr;?></span>
  <br><br>
  <label for="phone_NO">Phone number</label><br>
  <input type="text" name="phone_NO">
  <span class="error">* <?php echo $phone_NOErr;?></span>
  <br><br>
  <label for="username">Username</label><br>
  <input type="text" name="username">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  <label for="password">Password</label><br>
  <input type="password" name="password">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Sign up">
</form>
</body>


</html>
