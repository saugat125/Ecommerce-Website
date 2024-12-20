<?php
session_start();
    include "../connect.php";
    include "../notification.php";

    if (isset($_GET['email']) && isset($_GET['verification_code']))
    {
        $email = $_GET['email'];
        $verification_code = $_GET['verification_code'];

        //QUERY TO GET THE USER_ID FROM EMAIL
        $query = "SELECT user_id FROM users WHERE email = :email";

        $query_parse = oci_parse($conn, $query);

        oci_bind_by_name($query_parse, ':email', $email);

        oci_execute($query_parse);

        $row_user = oci_fetch_array($query_parse, OCI_ASSOC);

        if ($row_user) {
            $user_id = $row_user['USER_ID'];
    
            // QUERY TO SELECT * FROM CUSTOMER TABLE WITH USER_ID AND VERIFICATION CODE
            $query_customer = "SELECT * FROM customer WHERE user_id = :user_id AND verification_code = :verification_code";
    
            $query_parse_customer = oci_parse($conn, $query_customer);
            oci_bind_by_name($query_parse_customer, ':user_id', $user_id);
            oci_bind_by_name($query_parse_customer, ':verification_code', $verification_code);
            oci_execute($query_parse_customer);
    
            $row_customer = oci_fetch_array($query_parse_customer, OCI_ASSOC);
    
            if ($row_customer) {
                //CHECKING IF USER IS VERIFIED
                if ($row_customer['ISVERIFIED'] == 'N') {
                    // QUERY TO UPDATE ISVERIFIED TO 'Y' FOR THE GIVEN USER_ID
                    $query_update = "UPDATE customer SET isverified = 'Y' WHERE user_id = :user_id";

                    $query_parse_update = oci_parse($conn, $query_update);
                    oci_bind_by_name($query_parse_update, ':user_id', $user_id);
                    oci_execute($query_parse_update);

 
                    if (oci_commit($conn)) {
                        $_SESSION['message'] = "User with user_id: $user_id has been verified successfully.";
                        $_SESSION['message_type'] = 'success';
                    } else {
                        $_SESSION['message'] = "Error occurred while verifying the user.";
                        $_SESSION['message_type'] = 'error';
                    }
                } else {
                    $_SESSION['message'] = "Email is already verified.";
                    $_SESSION['message_type'] = 'error';
                }
            } else {
                $_SESSION['message'] = "Invalid verification code.";
                $_SESSION['message_type'] = 'error';
            }
        } else {
            $_SESSION['message'] = "No user found with email: $email.";
            $_SESSION['message_type'] = 'error';
        }
    } else {
        $_SESSION['message'] = "Email or verification code not provided.";
        $_SESSION['message_type'] = 'error';
    }
    
    oci_close($conn);
    
    // Redirect back to customer_reg.php after displaying the message
    header("Location: ../login/login.php");
    exit;
    ?>