<?php
session_start();
include ('../connect.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $trader_id = $_SESSION['user_id'];

    // Query to get the shop_id
    $shop_id_query = "SELECT shop_id FROM shop WHERE trader_id = :trader_id";

    // Prepare the statement
    $shop_id_stmt = oci_parse($conn, $shop_id_query);

    // Bind the trader_id parameter
    oci_bind_by_name($shop_id_stmt, ':trader_id', $trader_id);

    // Execute the statement
    oci_execute($shop_id_stmt);

    // Fetch the result
    $shop_id = null;
    if ($row = oci_fetch_assoc($shop_id_stmt)) {
        $shop_id = $row['SHOP_ID'];
    }

    // Close the statement
    oci_free_statement($shop_id_stmt);

    $query = "INSERT INTO PRODUCT_CATEGORY (CATEGORY_NAME, SHOP_ID) VALUES('$name','$shop_id')";

    $insert_stmt = oci_parse($conn, $query);

    if (oci_execute($insert_stmt)) {
        header('location: product_category.php');
    } else {
        echo '<script>alert("ERROR: ' . oci_error($insert_stmt) . '")</script>';
    }
    
}
oci_close($conn);
?>