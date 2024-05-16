<?php
include "../connect.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $date_of_birth = $_POST['date_of_birth'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];

    $shop_name = $_POST['shop_name'];
    $shop_desc = $_POST['shop_desc'];
    $shop_address = $_POST['shop_address'];

    // Prepare SQL statement for insertion into USERS table
    $sql_users = "INSERT INTO USERS (user_name, email, password, user_role, first_name, last_name, date_of_birth, phone_number) 
                  VALUES (:email, :email, :password, 'trader', :first_name, :last_name, TO_DATE(:date_of_birth, 'YYYY-MM-DD'), :phone_number)";
    $stmt_users = oci_parse($conn, $sql_users);
    oci_bind_by_name($stmt_users, ':email', $email);
    oci_bind_by_name($stmt_users, ':password', $password);
    oci_bind_by_name($stmt_users, ':first_name', $first_name);
    oci_bind_by_name($stmt_users, ':last_name', $last_name);
    oci_bind_by_name($stmt_users, ':date_of_birth', $date_of_birth);
    oci_bind_by_name($stmt_users, ':phone_number', $phone_number);

    // Execute SQL statement for insertion into USERS table
    $result_users = oci_execute($stmt_users);
    if (!$result_users) {
        echo "Error inserting into USERS table: " . oci_error($stmt_users);
        exit;
    }

    // Get the user_id of the newly inserted user from USERS table
    $user_id_query = "SELECT user_id_seq.currval FROM dual";
    $stmt_user_id = oci_parse($conn, $user_id_query);
    oci_execute($stmt_user_id);
    $row = oci_fetch_assoc($stmt_user_id);
    $user_id = $row['CURRVAL'];

    // Free statement
    oci_free_statement($stmt_users);
    oci_free_statement($stmt_user_id);

    // Prepare SQL statement for insertion into TRADER table
    $sql_trader = "INSERT INTO TRADER (user_id, date_joined, isVerified) 
                     VALUES (:user_id, SYSDATE, 'N')";
    $stmt_trader = oci_parse($conn, $sql_trader);
    oci_bind_by_name($stmt_trader, ':user_id', $user_id);

    // Execute SQL statement for insertion into TRADER table
    $result_trader = oci_execute($stmt_trader);
    if (!$result_trader) {
        echo "Error inserting into TRADER table: " . oci_error($stmt_customer);
        exit;
    }


    //Prepare SQL query to update SHOP of TRADER
    $sql_shop = "UPDATE SHOP
    SET shop_name = :shop_name,
        shop_description = :shop_description,
        address = :address
    WHERE trader_id = :trader_id";

    $stmt_shop = oci_parse($conn, $sql_shop);

    oci_bind_by_name($stmt_shop, ':shop_name', $shop_name);
    oci_bind_by_name($stmt_shop, ':shop_description', $shop_desc);
    oci_bind_by_name($stmt_shop, ':address', $shop_address);
    oci_bind_by_name($stmt_shop, ':trader_id', $user_id);

    $result_shop = oci_execute($stmt_shop);

    if (!$result_shop) {
    echo "Error updating SHOP table: " . oci_error($stmt_shop);
    exit;
    }


    // Free statement
    oci_free_statement($stmt_trader);
    oci_free_statement($stmt_shop);

    echo "Account created successfully!";

    // Redirect to login.php
    header("Location: ../login/login.php");
    exit;
}

oci_close($conn);
?>
