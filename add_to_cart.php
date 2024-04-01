<?php

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

    // Check if the query was successful and if a row was returned
    if($result && $row = mysqli_fetch_assoc($result)) {
        // Output product information
?>
        <h1><?php echo $row['product_name']; ?></h1>
        <label>Price: $<?php echo $row['product_price']; ?></label>
        <br>
<?php
    } else {
        echo "Error: Product not found";
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
          echo "<option value='$i'>$i</option>";
      }
      ?>
    </select>
    <button type="submit" name="add-to-cart">Add to Cart</button>
  </form>

<?php
session_start();
// Handle form submission of quantity
if(isset($_POST['add-to-cart'])) {
    $user_id = $_SESSION['id'];
    $productId = $_GET['product_id'] ?? null; // Assuming you're passing the product ID via GET
    $selected = isset($_POST['quantity']) ? $_POST['quantity'] : 1; // Assuming you're retrieving the selected quantity from the form
    
    if($productId) {
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
    } else {
        echo "Error: Product ID not provided";
    }
}
?>

<h1><a href="cart.php">View Cart</a></h1>
</body>
</html>
