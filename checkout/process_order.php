<?php
session_start();
include('../connect.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Retrieve the total price from the URL parameters
    $total_price = isset($_GET['total_price']) ? $_GET['total_price'] : 0;
    
    $cart_id = $_SESSION['cart_id'];
    $customer_id = $_SESSION['user_id']; // Assuming customer_id is stored in the session

    $date = $_SESSION['date'];
    $time = $_SESSION['time'];
    $dayOfWeek = $_SESSION['day'];

    $order_date = new DateTime();
    $collection_date = new DateTime(); // You should set this based on the user’s selection
    $collection_slot_id = 1; // This should also be based on the user’s selection

    $collection_query = oci_parse($conn, "SELECT COLLECTION_SLOT_ID FROM COLLECTION_SLOT WHERE COLLECTION_DAY = :day AND TIME_SLOT = :time_slot");
    oci_bind_by_name($collection_query, ':day', $dayOfWeek);
    oci_bind_by_name($collection_query, ':time_slot', $time);
    oci_execute($collection_query); 

    $collection_slot_id = null;
    if ($row = oci_fetch_assoc($collection_query)) {
        $collection_slot_id = $row['COLLECTION_SLOT_ID'];
    }   

    // Prepare and execute query to insert order into ORDERS table
    $order_query = oci_parse($conn, "INSERT INTO ORDERS (ORDER_DATE, TOTAL_PRICE, COLLECTION_DATE, CART_ID, CUSTOMER_ID, COLLECTION_SLOT_ID) VALUES (SYSDATE, :total_price, :collection_date, :cart_id, :customer_id, :collection_slot_id)");
    oci_bind_by_name($order_query, ':total_price', $total_price);
    oci_bind_by_name($order_query, ':collection_date', $date); // Assuming collection date is the same as selected date
    oci_bind_by_name($order_query, ':cart_id', $cart_id);
    oci_bind_by_name($order_query, ':customer_id', $customer_id);
    oci_bind_by_name($order_query, ':collection_slot_id', $collection_slot_id);
    oci_execute($order_query);

    // Get the user_id of the newly inserted user from USERS table
    $order_id_query = "SELECT order_id_seq.CURRVAL AS order_id FROM dual";
    $stmt_order_id = oci_parse($conn, $order_id_query);
    oci_execute($stmt_order_id);
    $row = oci_fetch_assoc($stmt_order_id);
    $order_id = $row['ORDER_ID'];


    // Prepare and execute query to insert payment into PAYMENT table
    $payment_query = oci_parse($conn, "INSERT INTO PAYMENT (PAYMENT_DATE, ORDER_ID, PAYMENT_TYPE_ID, CUSTOMER_ID, PAYMENT_AMOUNT) VALUES (SYSDATE, :order_id, 1, :customer_id, :payment_amount)");
    oci_bind_by_name($payment_query, ':order_id', $order_id);
    oci_bind_by_name($payment_query, ':customer_id', $customer_id);
    oci_bind_by_name($payment_query, ':payment_amount', $total_price);
    oci_execute($payment_query);
    

    // SQL query to select data from CART_PRODUCT table
    $cart_product_query = oci_parse($conn, "SELECT * FROM CART_PRODUCT WHERE CART_ID = :cart_id");
    oci_bind_by_name($cart_product_query, ':cart_id', $cart_id);
    oci_execute($cart_product_query);

    // Iterate through the selected rows and insert into ORDER_PRODUCT table
    while ($row = oci_fetch_assoc($cart_product_query)) {
        $product_id = $row['PRODUCT_ID'];
        $quantity = $row['QUANTITY'];

        // Insert data into ORDER_PRODUCT table
        $order_product_query = oci_parse($conn, "INSERT INTO ORDER_PRODUCT (ORDER_ID, PRODUCT_ID, QUANTITY) VALUES (:order_id, :product_id, :quantity)");
        oci_bind_by_name($order_product_query, ':order_id', $order_id); // Replace order_id with the actual order_id
        oci_bind_by_name($order_product_query, ':product_id', $product_id);
        oci_bind_by_name($order_product_query, ':quantity', $quantity);
        oci_execute($order_product_query);
    }

    // SQL query to delete data from CART_PRODUCT table for the specified cart_id
    $delete_query = oci_parse($conn, "DELETE FROM CART_PRODUCT WHERE CART_ID = :cart_id");
    oci_bind_by_name($delete_query, ':cart_id', $cart_id);
    // Execute the delete query
    oci_execute($delete_query);


    // Free resources
    oci_free_statement($cart_product_query);

    // Unset the variables from the session
    unset($_SESSION['date']);
    unset($_SESSION['time']);
    unset($_SESSION['day']);

    header("Location: ../home/index.php");

    exit;
} else {
    die('Invalid request method.');
}
?>
