
<h1>YOUR CART</h1>

<?php
session_start();
include_once ('connection/connection.php');
//PRINT OUT THE CART OF THE USER
if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
  $sql = "SELECT p.product_name, p.product_price, SUM(s.quantity) AS total_quantity
            FROM product_management p
            LEFT JOIN shopping_cart s ON p.product_id = s.product_id
            LEFT JOIN users u ON s.user_id = u.user_id
            WHERE u.user_id = $user_id
            GROUP BY p.product_name";
  $result = mysqli_query($con, $sql);

  if($result){
    $total_bill = 0;
    while($row = mysqli_fetch_assoc($result)){
      // Output each item in the cart
      echo "<div>";
      echo "<h2>" . $row['product_name'] . "</h2>";
      echo "<p>Price: " . $row['product_price'] . "</p>";
      echo "<p>Quantity: " . $row['total_quantity'] . "</p>";
      echo "<a href='checkout.php?product_id=" . $row['product_id'] . "'>Check out</a>";
      echo "</div>";

      $total = $row['product_price'] * $row['total_quantity'];
      $total_bill = $total_bill + $total;
    }
    echo "<p>Total Bill: " . $total_bill . "</p>";
    echo "<button>Check out all</button><br>";
    echo "<a href='customer.php'>Continue Shopping</a>";
  }
} else {
  echo "User ID is not set in session"; // Handle the case where user_id is not set in session
}
?>
