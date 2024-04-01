<?php
session_start();
include_once('connection/connection.php');

// Check if "Check out" button for a specific product is clicked
if(isset($_POST['user_id']) && isset($_POST['product_id'])) {
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];

    $sql = "SELECT p.product_name, p.product_price, SUM(s.quantity) AS total_quantity
            FROM product_management p
            INNER JOIN shopping_cart s ON p.product_id = s.product_id
            WHERE s.user_id = $user_id
            AND p.product_id = $product_id
            GROUP BY p.product_name, p.product_price";

    $result = mysqli_query($con, $sql);

    if($result) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div>";
            echo "<p>Product: " . $row['product_name'] . "</p>";
            echo "<p>Price: ₱" . number_format($row['product_price'], 2) . "</p>";
            echo "<p>Quantity: " . $row['total_quantity'] . "</p>";
            echo "<p>Total Price: ₱" . number_format($row['total_quantity'] * $row['product_price'], 2) . "</p>"; // Corrected calculation
            echo "<a href=''>Place Order</a>";
            echo "</div>";
        }
    }
}

// Check if "Check out all" button is clicked
if(isset($_POST['check_out_all'])) {
    $user_id = $_POST['user_id'];

    // SQL query to retrieve all items in the shopping cart for the user
    $sql = "SELECT p.product_name, p.product_price, SUM(s.quantity) AS total_quantity
            FROM product_management p
            INNER JOIN shopping_cart s ON p.product_id = s.product_id
            WHERE s.user_id = $user_id
            GROUP BY p.product_name, p.product_price";

    $result = mysqli_query($con, $sql);

    if($result && mysqli_num_rows($result) > 0) {
        // Display order details for all items in the shopping cart
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div>";
            echo "<p>Product: " . $row['product_name'] . "</p>";
            echo "<p>Price: ₱" . number_format($row['product_price'], 2) . "</p>";
            echo "<p>Quantity: " . $row['total_quantity'] . "</p>";
            echo "<p>Total: ₱" . number_format($row['total_quantity'] * $row['product_price'], 2) . "</p>"; // Corrected calculation
            echo "</div>";
        } 
       
        echo "<p>Total Bill: ₱" . number_format($_SESSION['total_bill'], 2) . "</p>";
        echo "<a href=''>Place Order</a>";

    } else {
        echo "No items found in the shopping cart.";
    }
}

echo "<br><a href='cart.php'><<</a>";
?>
