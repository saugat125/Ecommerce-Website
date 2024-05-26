<?php
include ('../connect.php');
include "../notification.php";

$customer_id = $_SESSION['user_id'];
$wishlist_id = $_SESSION['wishlist_id'];

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    
    // Check if the product is already in the wishlist
    $checkQuery = "SELECT * FROM WISHLIST_PRODUCT WHERE wishlist_id = :wishlist_id AND product_id = :product_id";
    $checkStmt = oci_parse($conn, $checkQuery);
    oci_bind_by_name($checkStmt, ':wishlist_id', $wishlist_id);
    oci_bind_by_name($checkStmt, ':product_id', $product_id);
    oci_execute($checkStmt);
    
    if (oci_fetch($checkStmt)) {
        $_SESSION['message'] = "Product already in wishlist";
        $_SESSION['message_type'] = "error";
    } else {
        // If product is not in the wishlist, insert it
        $insertQuery = "INSERT INTO WISHLIST_PRODUCT (product_id, wishlist_id) VALUES (:product_id, :wishlist_id)";
        $insertStmt = oci_parse($conn, $insertQuery);
        oci_bind_by_name($insertStmt, ':product_id', $product_id);
        oci_bind_by_name($insertStmt, ':wishlist_id', $wishlist_id);
        oci_execute($insertStmt);
        oci_free_statement($insertStmt);

        //sucess message 

        $_SESSION['message'] = "Product added to wishlist successfully";
        $_SESSION['message_type'] = "success";
    }
    
    oci_free_statement($checkStmt);

    oci_close($conn);
    
    // Redirect back to the products page or show a success message
    header("Location: ../home/index.php");
    exit;
}
?>
