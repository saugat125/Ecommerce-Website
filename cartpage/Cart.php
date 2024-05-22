<?php
    include('../connect.php');
    session_start();

    $cart_id = $_SESSION['cart_id'];

    $query = "
        SELECT 
            p.product_id,
            p.product_name,
            p.description,
            p.price,
            p.product_image,
            cp.quantity
        FROM 
            CART_PRODUCT cp
        JOIN 
            PRODUCT p ON cp.product_id = p.product_id
        WHERE 
            cp.cart_id = :cart_id
    ";

    $statement = oci_parse($conn, $query);
    oci_bind_by_name($statement, ':cart_id', $cart_id);
    oci_execute($statement);

    $products = [];
    while ($row = oci_fetch_assoc($statement)) {
        $products[] = $row;
    }

    oci_free_statement($statement);
    oci_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="main-container">
        <div class="container">
            <div class="continue-shopping-box">
                <div class="continue-shopping">
                    <a href="../home/index.php">&lt; Continue Shopping</a>
                </div>
            </div>
            <h2 class="shopping-cart">Shopping Cart</h2>

            <!-- Product Boxes -->
            <?php foreach ($products as $product) { ?>
                <div class="product-box">
                    <div class="product">
                        <div class="product-image">
                            <img src="../image/<?php echo $product['PRODUCT_IMAGE']; ?>" alt="<?php echo $product['PRODUCT_NAME']; ?>">
                        </div>
                        <div class="product-details">
                            <h3><?php echo $product['PRODUCT_NAME']; ?></h3>
                            <p class="additional-info"><?php echo $product['DESCRIPTION']; ?></p>
                        </div>
                        <div class="quantity">
                            <a href="update_quantity.php?action=increment&product_id=<?php echo $product['PRODUCT_ID']; ?>" class="arrow">&#9650;</a>
                            <span class="amount"><?php echo $product['QUANTITY']; ?></span>
                            <a href="update_quantity.php?action=decrement&product_id=<?php echo $product['PRODUCT_ID']; ?>" class="arrow">&#9660;</a>
                        </div>
                        <div class="price"><?php echo $product['PRICE']; ?>€</div>
                        <div class="delete-product">
                            <a href="delete_product.php?ID=<?php echo $product['PRODUCT_ID']; ?>" class="delete-btn">Delete</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            
            <!-- Total Box -->
            <div class="total-box">
                <?php 
                $total_items = count($products);
                $total_price = array_sum(array_column($products, 'PRICE'));
                ?>
                <div class="total-items">Total items: <span id="total-items"><?php echo $total_items; ?></span> items</div>
                <div class="total-price">Total price: <span id="total-price"><?php echo $total_price; ?>€</span></div>
            </div>
            
            <!-- Proceed to Checkout Box -->
            <div class="checkout-container">
                <div class="checkout-box">
                    <a href="checkout.html" class="checkout-button">Proceed to Checkout</a>
                </div>
                <!-- Process Payment Button -->
                <div class="payment-options-container">
                <button class="process-payment-button" onclick="togglePaymentOptions()">Process Payment</button>
                <div id="payment-options" style="display: none;">
                    <ul>
                        <li>
                            <a href="../payment.php" target="_blank">
                                <img src="paypal-logo.png" alt="PayPal" class="paypal-logo">
                                </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src = "script.js"></script>
</body>
</html>
