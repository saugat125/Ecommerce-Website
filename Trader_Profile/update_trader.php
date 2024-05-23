<?php
include ('../connect.php');
session_start();

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];


    // Fetching user_id from session
    $user_id = $_SESSION['user_id'];

    // Creating the update query
    $query = "UPDATE USERS SET 
                  FIRST_NAME = '$first_name', 
                  LAST_NAME = '$last_name', 
                  PASSWORD = '$password', 
                  PHONE_NUMBER = '$phone' 
                  WHERE USER_ID = '$user_id'";

    $query_stmt = oci_parse($conn, $query);

    // Executing the query
    if (oci_execute($query_stmt)) {
        $_SESSION['first_name'] = $first_name;
        header('location: traderprofile.php');

    } else {
        echo "Error updating record: ";
    }
}
?>