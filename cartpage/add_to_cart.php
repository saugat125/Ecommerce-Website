<?php
include ('../connect.php');
session_start();

$customer_id = $_SESSION['user_id'];
$cart_id = $_SESSION['cart_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'] ?? 1; // Set quantity to 1 if it's null or not provided
    
    // Check if the product is already in the cart
    $checkQuery = "SELECT * FROM CART_PRODUCT WHERE cart_id = :cart_id AND product_id = :product_id";
    $checkStmt = oci_parse($conn, $checkQuery);
    oci_bind_by_name($checkStmt, ':cart_id', $cart_id);
    oci_bind_by_name($checkStmt, ':product_id', $product_id);
    oci_execute($checkStmt);
    
    if (oci_fetch($checkStmt)) {
        echo "Product already in cart";
    } else {
        // If product is not in the cart, insert it
        $insertQuery = "INSERT INTO CART_PRODUCT (product_id, cart_id, quantity) VALUES (:product_id, :cart_id, :quantity)";
        $insertStmt = oci_parse($conn, $insertQuery);
        oci_bind_by_name($insertStmt, ':product_id', $product_id);
        oci_bind_by_name($insertStmt, ':cart_id', $cart_id);
        oci_bind_by_name($insertStmt, ':quantity', $quantity);
        oci_execute($insertStmt);
        oci_free_statement($insertStmt);
    }
    
    oci_free_statement($checkStmt);

    oci_close($conn);
    
    // Redirect back to the products page or show a success message
    header("Location: ../home/index.php");
    exit;
}
?>
