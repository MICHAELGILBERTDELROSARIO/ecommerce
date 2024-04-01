<?php
if(isset($_GET['logout'])) {
  // Unset all session variables
  session_unset();

  // Destroy the session
  session_destroy();

  // Redirect to the login page or any other appropriate page
  header('Location: index.php');
  exit();
}