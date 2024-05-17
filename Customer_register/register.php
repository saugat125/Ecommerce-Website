<?php
include "../connect.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendMail($email, $verification_code){
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'sweing111@gmail.com';                     //SMTP username
        $mail->Password   = 'blpz xduh hvxq uwls';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('sweing111@gmail.com', 'C-Fresh');

        $mail->addAddress($email);     //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification for CFresh Account.';
        $mail->Body    = "Thank you for choosing our website!!!<br> 
                        Click the link to verify your account.
                        <a href='http://localhost/Cfresh/Customer_register/verify.php?email=$email&verification_code=$verification_code'>Verify Your Account</a>";
    
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $date_of_birth = $_POST['date_of_birth'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];

    // Prepare SQL statement for insertion into USERS table
    $sql_users = "INSERT INTO USERS (user_name, email, password, user_role, first_name, last_name, date_of_birth, phone_number) 
                  VALUES (:email, :email, :password, 'customer', :first_name, :last_name, TO_DATE(:date_of_birth, 'YYYY-MM-DD'), :phone_number)";
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

    //Generate verfication code
    $verification_code = bin2hex(random_bytes(10));

    // Prepare SQL statement for insertion into CUSTOMER table
    $sql_customer = "INSERT INTO CUSTOMER (user_id, date_joined, verification_code, isVerified) 
                     VALUES (:user_id, SYSDATE, :verification_code, 'N')";
    $stmt_customer = oci_parse($conn, $sql_customer);
    oci_bind_by_name($stmt_customer, ':user_id', $user_id);
    oci_bind_by_name($stmt_customer, ':verification_code', $verification_code);

    // Execute SQL statement for insertion into CUSTOMER table
    $result_customer = oci_execute($stmt_customer);
    if (!$result_customer) {
        echo "Error inserting into CUSTOMER table: " . oci_error($stmt_customer);
        exit;
    }

    if (!sendMail($email,$verification_code)){
        echo "Error in sending Mail";
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
