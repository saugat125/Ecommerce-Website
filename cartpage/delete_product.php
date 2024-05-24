<?php
include('../connect.php');
include "../notification.php";
session_start();

if (isset($_GET['ID'])) {
    $cart_id = $_SESSION['cart_id'];
    $product_id = $_GET['ID'];

    // Delete the product from the cart_product table
    $query = "DELETE FROM CART_PRODUCT WHERE cart_id = :cart_id AND product_id = :product_id";
    $statement = oci_parse($conn, $query);
    oci_bind_by_name($statement, ':cart_id', $cart_id);
    oci_bind_by_name($statement, ':product_id', $product_id);

    if (oci_execute($statement)) {
        $_SESSION['message'] = "Product removed from cart successfully.";
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = "Failed to remove product from cart.";
        $_SESSION['message_type'] = 'error';
    }

    oci_free_statement($statement);
    oci_close($conn);

    // Redirect back to the cart page
    header("Location: Cart.php");
    exit();
} else {
    // If no product ID is provided, redirect back to the cart page with an error message
    $_SESSION['message'] = "No product ID provided.";
    $_SESSION['message_type'] = 'error';
    header("Location: Cart.php");
    exit();
}
?>
