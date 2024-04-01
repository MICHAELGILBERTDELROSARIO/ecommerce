<?php
session_start();

//redirect to index when user is not logged in
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
  header('Location: index.php');
  exit();
  }

// redirect to customer page when user is not seller
if(isset($_SESSION['role']) && $_SESSION['role'] != 'seller') {
  header('Location: customer.php');
  exit(); 
  }

include 'php_handlers/logout.php';

