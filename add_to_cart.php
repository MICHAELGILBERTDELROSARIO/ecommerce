<?php
session_start();
include_once('connection/connection.php');

// Check if the product ID is provided in the URL
if(isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    // Query to select the specific product using product id provided in URL
    $sql = "SELECT product_name, description, product_price 
            FROM product_management 
            WHERE product_id = $productId";

    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if the query was successful
    if($result) {
        // Check if a row was returned
        if(mysqli_num_rows($result) > 0) {
            // Fetch the row
            $row = mysqli_fetch_assoc($result);

            // Output product information
            ?>
            <h1><?php echo $row['product_name']; ?></h1>
            <label>Price: $<?php echo $row['product_price']; ?></label>
            <br>

            <!-- Add code to display other product details as needed -->
            <?php
        } 
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add to Cart</title>
</head>
<body>
  <!--   QUANTITY FORM     -->
  <form action="" method="post">
    <label for="quantity">Quantity:</label>
    <select name="quantity" id="quantity">
      <?php
      // Generate options for quantity selection
      for ($i = 1; $i <= 10; $i++) {
        // To maintain the quantity after reload
        $selected_attr = ($selected == $i) ? 'selected' : ''; // Check if the current option should be selected
        echo "<option value='$i' $selected_attr>$i</option>";
      }
      ?>
    </select>
    <button type="submit" name="add-to-cart">Add to Cart</button>
  </form>

</body>
</html>

<?php


if(isset($_POST['add-to-cart'])) {
  // Ensure that $productId and $selected are properly set
  $_SESSION['user_id'] = 2;
  $user_id = $_SESSION['user_id'];
  $productId = $_GET['product_id']; // Assuming you're passing the product ID via GET
  $selected = isset($_POST['quantity']) ? $_POST['quantity'] : 1; // Assuming you're retrieving the selected quantity from the form
  
  // SQL query to insert data into the shopping_cart table
  $sql = "INSERT INTO shopping_cart (product_id, user_id, quantity) VALUES ('$productId', '$user_id', '$selected')";

  // Execute the query
  $result = mysqli_query($con, $sql);

  // Check if the query was successful
  if($result) {
      echo "Item added to cart successfully";
  } else {
      // Display an error message if the query fails
      echo "Error: " . mysqli_error($con);
  }
}


?>

<h1><a href="cart.php">View Cart</a></h1>
