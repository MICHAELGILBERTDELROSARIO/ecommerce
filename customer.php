<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Page</title>
</head>
<body>
  <h1>CUSTOMER</h1>
<form action="" method="get">
  <div class="search-container">
    <input type="text" name="search-bar" placeholder="Search Product">
    <button type="submit" name="search-button">Search</button>
  </div>
</form>
  
</body>
</html>

<?php
session_start();
include_once('connection/connection.php');
if(isset($_GET['search-button'])){
  $searched = $_GET['search-bar'];
  $user_id = 2;
  //QUERY
  $sql = "SELECT * FROM product_management WHERE product_name LIKE '$searched%'";
  $result = mysqli_query($con, $sql);

  if(mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)){
      echo $row['product_name'] . "<br>";
      echo $row['description'] . "<br>";
      echo $row['product_price'] . "<br>";
      ?>
      <!--  Push the product_id and user_id as parameter on the add to cart page  -->
      <a href="add_to_cart.php?product_id=<?php echo $row['product_id']; ?>&user_id=<?php echo $user_id; ?>">add to cart</a><br>

      <a href="">check out</a><br>
      <?php
    }
  } else {
    echo "No results found.";
  }
}


?>