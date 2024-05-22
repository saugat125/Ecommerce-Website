<?php
include ('../connect.php');
session_start();

$customer_id = $_SESSION['user_id'];
$cart_id = $_SESSION['cart_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    
    // Check if the product is already in the cart
    $checkQuery = "SELECT * FROM CART_PRODUCT WHERE cart_id = :cart_id AND product_id = :product_id";
    $checkStmt = oci_parse($conn, $checkQuery);
    oci_bind_by_name($checkStmt, ':cart_id', $cart_id);
    oci_bind_by_name($checkStmt, ':product_id', $product_id);
    oci_execute($checkStmt);
    
    if (oci_fetch($checkStmt)) {
        // If product is already in cart, update the quantity
        $updateQuery = "UPDATE CART_PRODUCT SET quantity = quantity + 1 WHERE cart_id = :cart_id AND product_id = :product_id";
        $updateStmt = oci_parse($conn, $updateQuery);
        oci_bind_by_name($updateStmt, ':cart_id', $cart_id);
        oci_bind_by_name($updateStmt, ':product_id', $product_id);
        oci_execute($updateStmt);
    } else {
        // If product is not in the cart, insert it
        $insertQuery = "INSERT INTO CART_PRODUCT (cart_product_id, product_id, cart_id, quantity) VALUES (CART_PRODUCT_SEQ.NEXTVAL, :product_id, :cart_id, 1)";
        $insertStmt = oci_parse($conn, $insertQuery);
        oci_bind_by_name($insertStmt, ':product_id', $product_id);
        oci_bind_by_name($insertStmt, ':cart_id', $cart_id);
        oci_execute($insertStmt);
    }
    
    oci_free_statement($checkStmt);
    oci_free_statement($insertStmt);
    oci_free_statement($updateStmt);
    oci_close($conn);
    
    // Redirect back to the products page or show a success message
    header("Location: products.php");
    exit;
}
?>
