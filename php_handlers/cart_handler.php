<?php
session_start();
include_once('connection/connection.php');

// Check if the session is set
if(isset($_SESSION['id'])){
    // Set user ID from session
    $user_id = $_SESSION['id'];
    // MySQL query to select data from the database
    $sql = "SELECT s.cart_id, p.product_id, p.product_name, p.product_price, SUM(s.quantity) 
        AS total_quantity
        FROM product_management p
        LEFT JOIN shopping_cart s ON p.product_id = s.product_id
        LEFT JOIN users u ON s.user_id = u.user_id
        WHERE u.user_id = $user_id
        GROUP BY p.product_id"; 

    // Execute the query
    $result = mysqli_query($con, $sql);

    if($result){
        // Define total bill
        $total_bill = 0;
        // Check if there are items in the cart
        if(mysqli_num_rows($result) > 0) {
            // Fetch data from the database
            while($row = mysqli_fetch_assoc($result)){
                echo "<div>";
                echo "<h2>" . $row['product_name'] . "</h2>";
                echo "<p>Price: ₱" . number_format($row['product_price'], 2) . "</p>";
                echo "<p>Quantity: " . $row['total_quantity'] . "</p>";
                ?>
                <form action="check_out.php" method="post">
                  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                  <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                  <button type="submit">Check out</button>
                </form>
                
                <?php
                echo "</div>";
                // Get the total bill
                $total = $row['product_price'] * $row['total_quantity'];
                $total_bill += $total;
                $_SESSION['total_bill'] = $total_bill;
            }

            echo "<p>Total Bill: ₱" . number_format($total_bill, 2) . "</p>";
            
        } else {
            // Cart is empty
            echo "<p>Your cart is empty. <a href='customer.php'>Continue Shopping</a></p>";
        }
    }
  }