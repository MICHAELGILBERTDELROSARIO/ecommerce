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
include_once('connection/connection.php');
if(isset($_GET['search-button'])){
  $searched = $_GET['search-bar'];
  //QUERY
  $sql = "SELECT * FROM product_management WHERE product_name LIKE '%N%'";
  $result = mysqli_query($con, $sql);

  if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
      echo $row['product_name'] . "<br>";
      echo $row['description'] . "<br>";
      echo $row['product_price'] . "<br>";
    }
  } else {
    echo "No results found.";
  }
}


?>