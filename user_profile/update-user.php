<?php
include ('../connect.php');
include "../notification.php";
session_start();

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $error = false; // Flag to track any validation error

    // Validation for first name and last name to contain only alphabets
    if (!preg_match("/^[a-zA-Z]*$/", $first_name) || !preg_match("/^[a-zA-Z]*$/", $last_name)) {
        $_SESSION['message'] = "First name and last name must contain only alphabets.";
        $_SESSION['message_type'] = "error";
        $error = true;
    }

    // Validation for password length
    if (strlen($password) < 8) {
        $_SESSION['message'] = "Password must be at least 8 characters long.";
        $_SESSION['message_type'] = "error";
        $error = true;
    }

    // Validation for phone number to contain only numbers
    if (!preg_match("/^[0-9]*$/", $phone)) {
        $_SESSION['message'] = "Phone number must contain only numbers.";
        $_SESSION['message_type'] = "error";
        $error = true;
    }

    if (!$error) {
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
            header('location: user_profile.php');
        } else {
            $_SESSION['message'] = "Error updating record: ";
            $_SESSION['message_type'] = "error";
        }
    } else {
        header('location: user_profile.php'); // Redirect back to the form if there is an error
    }
}
?>