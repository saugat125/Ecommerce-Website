<?php
include('../connect.php');
include "../notification.php";
session_start();

if (isset($_GET['action']) && isset($_GET['product_id'])) {
    $cart_id = $_SESSION['cart_id'];
    $product_id = $_GET['product_id'];
    $action = $_GET['action'];

    // Fetch the max_order value for the product
    $maxOrderQuery = "SELECT max_order FROM PRODUCT WHERE PRODUCT_ID = :product_id";
    $maxOrderStmt = oci_parse($conn, $maxOrderQuery);
    oci_bind_by_name($maxOrderStmt, ':product_id', $product_id);
    oci_execute($maxOrderStmt);

    if ($row = oci_fetch_assoc($maxOrderStmt)) {
        $max_order = $row['MAX_ORDER'];

        // Update the cart product quantity based on the action
        if ($action == 'increment') {
            // Increment the quantity but ensure it does not exceed max_order
            $query = "UPDATE CART_PRODUCT 
                      SET quantity = LEAST(quantity + 1, :max_order) 
                      WHERE cart_id = :cart_id AND product_id = :product_id";
        } elseif ($action == 'decrement') {
            // Ensure quantity does not go below 1
            $query = "UPDATE CART_PRODUCT 
                      SET quantity = GREATEST(quantity - 1, 1) 
                      WHERE cart_id = :cart_id AND product_id = :product_id";
        } else {
            $_SESSION['message'] = "Invalid action.";
            $_SESSION['message_type'] = "error";
            oci_free_statement($maxOrderStmt);
            oci_close($conn);
            header("Location: Cart.php");
            exit();
        }

        $statement = oci_parse($conn, $query);
        oci_bind_by_name($statement, ':cart_id', $cart_id);
        oci_bind_by_name($statement, ':product_id', $product_id);
        oci_bind_by_name($statement, ':max_order', $max_order);

        if (oci_execute($statement)) {
            $_SESSION['message'] = "Quantity updated successfully.";
            $_SESSION['message_type'] = 'success';
        } else {
            $_SESSION['message'] = "Failed to update quantity.";
            $_SESSION['message_type'] = 'error';
        }

        oci_free_statement($statement);
    } else {
        $_SESSION['message'] = "Product not found.";
        $_SESSION['message_type'] = 'error';
    }

    oci_free_statement($maxOrderStmt);
    oci_close($conn);

    // Redirect back to the cart page
    header("Location: Cart.php");
    exit();
} else {
    // If no action or product ID is provided, redirect back to the cart page with an error message
    $_SESSION['message'] = "No action or product ID provided.";
    $_SESSION['message_type'] = 'error';
    header("Location: Cart.php");
    exit();
}
?>
