<?php
include('../connect.php');
session_start();

if (isset($_GET['action']) && isset($_GET['product_id'])) {
    $cart_id = $_SESSION['cart_id'];
    $product_id = $_GET['product_id'];
    $action = $_GET['action'];

    if ($action == 'increment') {
        $query = "UPDATE CART_PRODUCT SET quantity = quantity + 1 WHERE cart_id = :cart_id AND product_id = :product_id";
    } elseif ($action == 'decrement') {
        // Ensure quantity does not go below 1
        $query = "UPDATE CART_PRODUCT SET quantity = GREATEST(quantity - 1, 1) WHERE cart_id = :cart_id AND product_id = :product_id";
    } else {
        $_SESSION['message'] = "Invalid action.";
        header("Location: Cart.php");
        exit();
    }

    $statement = oci_parse($conn, $query);
    oci_bind_by_name($statement, ':cart_id', $cart_id);
    oci_bind_by_name($statement, ':product_id', $product_id);

    if (oci_execute($statement)) {
        $_SESSION['message'] = "Quantity updated successfully.";
    } else {
        $_SESSION['message'] = "Failed to update quantity.";
    }

    oci_free_statement($statement);
    oci_close($conn);

    // Redirect back to the cart page
    header("Location: Cart.php");
    exit();
} else {
    // If no action or product ID is provided, redirect back to the cart page with an error message
    $_SESSION['message'] = "No action or product ID provided.";
    header("Location: Cart.php");
    exit();
}
?>
