<?php
// login.php
session_start();
include "../connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['user_role'];

    // Preparing the SQL statement with a join between users and customer tables
    $sql = "SELECT u.user_id 
            FROM users u 
            JOIN customer c ON u.user_id = c.user_id 
            WHERE u.user_name = :email 
              AND u.password = :password 
              AND u.user_role = :role 
              AND c.isverified = 'Y'";

    $stid = oci_parse($conn, $sql);

    // Binding the input parameters to the query
    oci_bind_by_name($stid, ':email', $email);
    oci_bind_by_name($stid, ':password', $password);
    oci_bind_by_name($stid, ':role', $role);

    // Executing the query
    oci_execute($stid);

    // Fetching the result
    $row = oci_fetch_array($stid, OCI_ASSOC);

    if ($row) {
        // Store user information in session variables
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $row['USER_ID'];
        $_SESSION['user_role'] = $role;

        $_SESSION['notification'] = [
            'message' => 'Login successful!',
            'type' => 'success'
        ];

        // Redirect to the appropriate page
        header("Location: ../home/index.php");
        exit;
    } else {
        $_SESSION['notification'] = [
            'message' => 'Invalid email or password.',
            'type' => 'error'
        ];

        // Redirect back to the login page
        header("Location: login.php");
        exit;
    }
    // Freeing the statement and closing the connection
    oci_free_statement($stid);
    oci_close($conn);
}   
?>