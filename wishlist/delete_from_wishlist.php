<?php
include "../notification.php";
include('../connect.php');
session_start();

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $wishlist_id = $_SESSION['wishlist_id'];

    $deleteQuery = "DELETE FROM WISHLIST_PRODUCT WHERE PRODUCT_ID = :product_id AND WISHLIST_ID = :wishlist_id";
    $deleteStmt = oci_parse($conn, $deleteQuery);
    oci_bind_by_name($deleteStmt, ':product_id', $product_id);
    oci_bind_by_name($deleteStmt, ':wishlist_id', $wishlist_id);

    if (oci_execute($deleteStmt)) {
        // Redirect back to the wishlist page with a success message
        header("Location: wishlist.php");
        exit;
    } else {
        // Redirect back to the wishlist page with an error message
        header("Location: wishlist.php?message=Error+deleting+item");
        exit;
    }

    oci_free_statement($deleteStmt);
    oci_close($conn);
} else {
    // Redirect back to the wishlist page if no product_id is provided
    header("Location: wishlist.php?message=No+item+specified");
    exit;
}
?>
