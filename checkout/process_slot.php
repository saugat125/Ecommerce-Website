<?php
session_start();
include('../connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $cart_id = $_SESSION['cart_id'];
    
    $_SESSION['date'] = $date;
    $_SESSION['time'] = $time;
    
    // Validate the input
    if (empty($date) || empty($time)) {
        die('Please select a valid day and time slot.');
    }

    // Convert the date string to a DateTime object
    $datetime = new DateTime($date);

    // Get the day of the week
    $dayOfWeek = $datetime->format('l'); // 'l' (lowercase 'L') will return the full day name (e.g., "Wednesday")

    $_SESSION['day'] = $dayOfWeek;
    
    $selectedDay = new DateTime($date);
    $currentDay = new DateTime();
    $currentDay->setTime(0, 0, 0);
    
    $diff = $selectedDay->diff($currentDay)->format('%a');
    if ($diff < 1) {
        die('Please select a day at least 24 hours from now.');
    }

    $collection_query = oci_parse($conn, "SELECT COLLECTION_SLOT_ID FROM COLLECTION_SLOT WHERE COLLECTION_DAY = :day AND TIME_SLOT = :time_slot");
    oci_bind_by_name($collection_query, ':day', $dayOfWeek);
    oci_bind_by_name($collection_query, ':time_slot', $time);
    oci_execute($collection_query); 

    $collection_slot_id = null;
    if ($row = oci_fetch_assoc($collection_query)) {
        $collection_slot_id = $row['COLLECTION_SLOT_ID'];
    }   
    
    // Check for the maximum number of orders
    $query = oci_parse($conn, "SELECT COUNT(*) AS ORDER_COUNT FROM orders WHERE collection_slot_id = :collection_slot_id");
    oci_bind_by_name($query, ':collection_slot_id', $collection_slot_id);
    oci_execute($query);
    
    $orderCount = 0;
    if ($row = oci_fetch_assoc($query)) {
        $orderCount = $row['ORDER_COUNT'];
    }
    
    if ($orderCount >= 20) {
        die('This time slot is fully booked. Please select another slot.');
    }
    
    oci_free_statement($query);
    oci_close($conn);

    // Redirect to checkout.php
    header("Location: checkout.php");
    exit; // Ensure that script execution stops after the redirect

} else {
    die('Invalid request method.');
}
?>
