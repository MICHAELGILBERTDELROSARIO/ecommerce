<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    $_SESSION['logged_in'] = false; // Set default to indicate no user is logged in
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOME</title>
</head>
<body>
  <h1>HOME PAGE</h1>
</body>
</html>

<a href="registration.php">Register</a>
<a href="login.php">Login</a>