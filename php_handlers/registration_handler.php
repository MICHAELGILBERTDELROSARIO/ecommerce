<?php
include_once('connection/connection.php');
if(isset($_POST['register'])){ // Fix here
  $email = $_POST['email'];
  $password = $_POST['password'];
  $verify_password = $_POST['verify_password'];
  //encrypt the password
  $passwordHash = password_hash($password, PASSWORD_DEFAULT);
  //define array error to store the possible error
  $errors = array();

  if(empty($email) || empty($password) || empty($verify_password)){
    array_push($errors, "All fields are required");
  }

  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    array_push($errors, "Email is not valid");
  }

  if(strlen($password)<7){
    array_push($errors, "Password must be at least 7 characters long");
  }

  if($password !== $verify_password){ // Fix here
    array_push($errors, "Password does not match");
  }

  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($con, $sql);
  $rowCount = mysqli_num_rows($result);
    if($rowCount > 0){
      array_push($errors, "Email already exists!");
    }
    if(count($errors) > 0){
      foreach ($errors as $error){
        echo "<div class='alert alert-danger'>$error</div>";
      }
    }else{
      $sql = "INSERT INTO users(email, password) VALUES ('$email', '$passwordHash')";
      $result = mysqli_query($con, $sql);

      if ($result) {
        echo "<div class='alert alert-primary'>Registration Successful</div>";
      } else {
          echo "Registration Unsuccessful: " . mysqli_error($con);
      }
    }
}
?>