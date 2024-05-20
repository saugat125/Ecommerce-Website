<?php
// login.php
session_start();
include "../connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['user_role'];

    // Initialize the SQL variable
    $sql = "";

    if ($role === 'customer') {
        // SQL statement for customer role
        $sql = "SELECT u.user_id 
                FROM users u 
                JOIN customer c ON u.user_id = c.user_id 
                WHERE u.user_name = :email 
                AND u.password = :password 
                AND u.user_role = :role 
                AND c.isverified = 'Y'";
    } else {
        // SQL statement for other roles (e.g., trader)
        $sql = "SELECT u.user_id 
                FROM users u 
                JOIN trader t ON u.user_id = t.user_id 
                WHERE u.user_name = :email 
                AND u.password = :password 
                AND u.user_role = :role 
                AND t.otpverified = 'Y'
                AND t.isverified = 'Y'";
    }

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

        if ($role == 'customer'){
            // Redirect to the appropriate page
            header("Location: ../home/index.php");
        }
        else{
            //Redirect to Trader Dashboard
            $trader_id = $_SESSION['user_id'];
            $shop_query = "SELECT * FROM SHOP WHERE TRADER_ID = '$trader_id'";

            $shop_stmt = oci_parse($conn, $shop_query);
            oci_execute($shop_stmt);

            $row = oci_fetch_assoc($shop_stmt);
            $_SESSION['shop_id'] = $row['SHOP_ID'];
            $_SESSION['shop_name'] = $row['SHOP_NAME'];

            header("Location: ../trader-dashboard/homepage.php");
        }
        
        exit;
    } 
    else {
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