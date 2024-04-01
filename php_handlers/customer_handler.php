<?php

session_start();
//redirect to seller if the role is not customer
if(isset($_SESSION['role']) && $_SESSION['role'] != 'customer'){
  header('Location: seller.php');
  exit();
}
//redirect to index when user is not logged in
if($_SESSION['logged_in'] != true){
  header('Location: index.php');
  exit();
}

  // Handle search form submission
  if(isset($_GET['search-button'])){
      $searched = $_GET['search-bar'];
      

      if(empty($searched)) {
        // Do nothing
    } else {
         // Query to search for products
      $sql = "SELECT * FROM product_management WHERE product_name LIKE '$searched%'";
      
      $result = mysqli_query($con, $sql);

      if(mysqli_num_rows($result) > 0) {
          // Display search results
          while($row = mysqli_fetch_assoc($result)){
              echo $row['product_name'] . "<br>";
              echo $row['description'] . "<br>";
              echo $row['product_price'] . "<br>";
  ?>
              <!-- Push the product_id and user_id as parameters to the add to cart page -->
              <a href="add_to_cart.php?product_id=<?php echo $row['product_id']; ?>">add to cart</a><br>
              <a href="">check out</a><br>
      <?php
            }
        } else {
            echo "No results found.";
        }
      } 

  }
  ?>