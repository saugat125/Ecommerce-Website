<?php
session_start();
include('../connect.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the total price from the form
    $total_price = $_POST['total_price'];
    $cart_id = $_SESSION['cart_id'];
    $customer_id = $_SESSION['user_id']; // Assuming customer_id is stored in the session

    // Example:
    $order_date = new DateTime();
    $collection_date = new DateTime(); // You should set this based on the user’s selection
    $collection_slot_id = 1; // This should also be based on the user’s selection

    // Insert the order
    $insert_order_query = oci_parse($conn, "INSERT INTO ORDERS (ORDER_DATE, TOTAL_PRICE, COLLECTION_DATE, CART_ID, CUSTOMER_ID, COLLECTION_SLOT_ID) VALUES (:order_date, :total_price, :collection_date, :cart_id, :customer_id, :collection_slot_id) RETURNING ORDER_ID INTO :order_id");
    $order_id = null;

    oci_bind_by_name($insert_order_query, ':order_date', $order_date->format('Y-m-d'));
    oci_bind_by_name($insert_order_query, ':total_price', $total_price);
    oci_bind_by_name($insert_order_query, ':collection_date', $collection_date->format('Y-m-d'));
    oci_bind_by_name($insert_order_query, ':cart_id', $cart_id);
    oci_bind_by_name($insert_order_query, ':customer_id', $customer_id);
    oci_bind_by_name($insert_order_query, ':collection_slot_id', $collection_slot_id);
    oci_bind_by_name($insert_order_query, ':order_id', $order_id, -1, OCI_B_INT);

    if (!oci_execute($insert_order_query)) {
        die('Error placing order. Please try again.');
    }
    oci_free_statement($insert_order_query);

    // Insert products into ORDER_PRODUCT table
    $cart_products_query = "
        SELECT 
            cp.PRODUCT_ID, 
            cp.QUANTITY, 
            p.PRICE
        FROM 
            CART_PRODUCT cp
        JOIN 
            PRODUCT p ON cp.PRODUCT_ID = p.PRODUCT_ID
        WHERE 
            cp.CART_ID = :cart_id
    ";
    $stmt = oci_parse($conn, $cart_products_query);
    oci_bind_by_name($stmt, ':cart_id', $cart_id);
    oci_execute($stmt);

    while ($row = oci_fetch_assoc($stmt)) {
        $insert_order_product_query = oci_parse($conn, "INSERT INTO ORDER_PRODUCT (ORDER_PRODUCT_ID, ORDER_ID, PRODUCT_ID, QUANTITY, PRICE) VALUES (ORDER_PRODUCT_SEQ.NEXTVAL, :order_id, :product_id, :quantity, :price)");
        oci_bind_by_name($insert_order_product_query, ':order_id', $order_id);
        oci_bind_by_name($insert_order_product_query, ':product_id', $row['PRODUCT_ID']);
        oci_bind_by_name($insert_order_product_query, ':quantity', $row['QUANTITY']);
        oci_bind_by_name($insert_order_product_query, ':price', $row['PRICE']);

        if (!oci_execute($insert_order_product_query)) {
            die('Error adding product to order. Please try again.');
        }
        oci_free_statement($insert_order_product_query);
    }
    oci_free_statement($stmt);

    // Close the Oracle connection
    oci_close($conn);

    // Redirect or notify user
    header('Location: order_success.php');
    exit;
} else {
    die('Invalid request method.');
}
?>
