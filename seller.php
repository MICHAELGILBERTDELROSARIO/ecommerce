<?php
include 'php_handlers/seller_handler.php';
?>
<h1>SELLER PAGE</h1>
<h1>Seller</h1>
                    <!--Check if the user is logged in-->
  <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): 
    $user_id = $_SESSION['id'];
  ?>
                    <!--Display logout button if true-->
  <form action="" method="get">
    <button type="submit" name="logout">Logout</button>
  </form>
  <?php endif; ?>