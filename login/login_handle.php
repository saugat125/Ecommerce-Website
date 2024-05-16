<?php
// login.php
session_start();
include "../connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['user_role'];

    // Preparing the SQL statement
    $sql = 'SELECT user_id FROM users WHERE user_name = :email AND password = :password AND user_role = :role';

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

        echo "Login successful!";
        // Redirect to the appropriate page
        header("Location: ../home/index.php");
        exit;
    } else {
        echo "Invalid email or password.";
    }

    // Freeing the statement and closing the connection
    oci_free_statement($stid);
    oci_close($conn);
}
?>
