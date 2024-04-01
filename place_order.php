<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check out slip!</title>
</head>
<body>
    <h1>Check out slip!</h1>

    <form id="checkoutForm" action="checkout_all.php" method="post">
        <label for="shippingAddress">Shipping Address:</label><br>
        <input type="text" name="shipping_address"><br>

        <label>Payment Method:</label><br>
        <input type="radio" id="cashOnDelivery" name="paymentMethod" value="cashOnDelivery" required>
        <label for="cashOnDelivery">Cash on Delivery</label><br>
        <input type="radio" id="gcash" name="paymentMethod" value="gcash" required>
        <label for="gcash">GCash Payment</label><br><br>

        <button type="button" onclick="confirmOrder()">Place Order</button>
    </form>

    <script>
        function confirmOrder() {
            // Display confirmation alert
            if (confirm("Are you sure you want to place the order?")) {
                // If user confirms, submit the form
                document.getElementById("checkoutForm").submit();
            } else {
                // If user cancels, do nothing
            }
        }
    </script>
</body>
</html>
