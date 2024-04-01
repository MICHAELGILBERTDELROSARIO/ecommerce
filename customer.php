<?php
include_once('connection/connection.php');
include 'php_handlers/customer_handler.php';




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Page</title>
</head>
<body>
  <h1>CUSTOMER</h1>
                  <!-- Check if the user is logged in -->
  <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): 
    $user_id = $_SESSION['id']; //set user_id
  ?>
                    <!-- Display logout button -->
  <form action="" method="get">
    <button type="submit" name="logout">Logout</button>
  </form>
  <?php endif; ?>
                    <!-- Search Form -->
  <form action="" method="get">
    <div class="search-container">
      <input type="text" name="search-bar" placeholder="Search Product">
      <button type="submit" name="search-button">Search</button>
    </div>
  </form>

  
</body>
</html>

<?php include 'php_handlers/logout.php'; 