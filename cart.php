<?php
    include 'php_handlers/cart_handler.php';
?>
<h1>YOUR CART</h1>
<a href="add_to_cart.php">back</a>
<?php 
// Include your database connection file
include 'connection/connection.php';

// Assuming $user_id is the user ID you want to check
$user_id = $_SESSION['id']; // or however you're getting the user ID

// Query to count the number of distinct product_id associated with the user_id
$sql = "SELECT COUNT(DISTINCT product_id) AS order_number FROM shopping_cart WHERE user_id = $user_id";

$result = mysqli_query($con, $sql);

if($result) {
    $row = mysqli_fetch_assoc($result);
    $order_number = $row['order_number'];

    // Check if there are items in the cart and if the user has only one product
    if($order_number > 1) {
        ?>
        <form action="check_out.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <button type="submit" name="check_out_all">Check out all</button>
        </form>
        <?php
    }
}
?>


