<?php
session_start();
if(isset($_SESSION['id'])){
  header('Location: customer.php');
}
include_once('connection/connection.php');

if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $errors = array();

    if(empty($email) || empty($password)){
        array_push($errors, "All fields are required");
    } else {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])){
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['user_id'];
                $_SESSION['logged_in'] = true;
                $_SESSION['role'] = $row['role'];
                if ($row['role'] == 'customer') {
                  header('Location: customer.php');
              } elseif ($row['role'] == 'seller' || $row['role'] == 'admin') {
                  header('Location: seller.php');
              } else {
                  // Handle other roles or unknown roles
              }
            } else {
                array_push($errors, "Invalid email/password combination");
            }
        } else {
            array_push($errors, "User not found");
        }
    }
}
?>