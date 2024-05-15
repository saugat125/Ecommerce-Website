<?php
$conn = oci_connect('sweing', 'cruso122', '//localhost/xe');
if (!$conn) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];

    // Prepare SQL statement for insertion into USERS table
    $sql_users = "INSERT INTO USERS (user_id, user_name, email, password, user_role, first_name, last_name, date_of_birth) 
                  VALUES (user_id_seq.nextval, :email, :email, :password, 'customer', :first_name, :last_name, TO_DATE(:date_of_birth, 'YYYY-MM-DD'))";
    $stmt_users = oci_parse($conn, $sql_users);
    oci_bind_by_name($stmt_users, ':email', $email);
    oci_bind_by_name($stmt_users, ':password', $password);
    oci_bind_by_name($stmt_users, ':first_name', $first_name);
    oci_bind_by_name($stmt_users, ':last_name', $last_name);
    oci_bind_by_name($stmt_users, ':date_of_birth', $date_of_birth);

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

    // Prepare SQL statement for insertion into CUSTOMER table
    $sql_customer = "INSERT INTO CUSTOMER (user_id, date_joined, isVerified) 
                     VALUES (:user_id, SYSDATE, 'N')";
    $stmt_customer = oci_parse($conn, $sql_customer);
    oci_bind_by_name($stmt_customer, ':user_id', $user_id);

    // Execute SQL statement for insertion into CUSTOMER table
    $result_customer = oci_execute($stmt_customer);
    if (!$result_customer) {
        echo "Error inserting into CUSTOMER table: " . oci_error($stmt_customer);
        exit;
    }

    // Free statement
    oci_free_statement($stmt_customer);

    echo "Account created successfully!";

    // Redirect to login.php
    header("Location: ../login/login.php");
    exit;
}

oci_close($conn);
?>
