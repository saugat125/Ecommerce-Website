<?php
session_start();
include "../connect.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $verification_code){
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'CFresh8008@gmail.com';                 // SMTP username
        $mail->Password   = 'veey kotg gkbb hgxi';                  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
        $mail->Port       = 465;                                    // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // Recipients
        $mail->setFrom('CFresh8008@gmail.com', 'C-Fresh');
        $mail->addAddress($email);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Email Verification for CFresh Account';
        $mail->Body    = "
        <html>
        <head>
            <style>
                .email-container {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    color: #000000;
                    max-width: 600px;
                    margin: auto;
                    padding: 20px;
                    border: 1px solid #ddd;
                    border-radius: 10px;
                    background-color: #f9f9f9;
                }

                body, html {
                  font-family: 'Roboto', sans-serif;
                  margin: 0;
                  padding: 0;
                  height: 100%;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  background-color: #f5f5f5;
                }
                
                .container {
                  text-align: center;
                  padding: 40px;
                }
                
                .content h1,
                .content h2,
                .content p,
                .content .image-text {
                  color: rgb(0, 0, 0); /* Set text color to white */
                }
                
                .content h1 {
                  font-size: 24px;
                  font-weight: 700;
                  margin-bottom: 10px;
                }
                
                .content h2 {
                  font-size: 18px;
                  font-weight: 700;
                  margin-bottom: 10px;
                }
                
                .content p {
                  font-size: 14px;
                  line-height: 1.5;
                  margin-bottom: 10px;
                }
                
                .image-text {
                  font-size: 12px;
                  margin-top: 10px;
                }
                
                .button {
                  background-color: #000000;
                  color: white; /* Changed text color to white */
                  padding: 12px 24px;
                  border: none;
                  border-radius: 4px;
                  font-size: 16px;
                  cursor: pointer;
                  transition: background-color 0.3s ease;
                  margin-top: 20px;
                }
                .button a{
                    color: white;
                    text-decoration: none;
                }
                .button:hover {
                  background-color: #3b5aa3;
                }
                
                .email-footer {
                    text-align: center;
                    padding-top: 20px;
                    border-top: 1px solid #ddd;
                    color: #777;
                }
                .email-footer a {
                    color: #27ae60;
                    text-decoration: none;
                }
            </style>
        </head>
        <body>
            <div class='email-container'>
                <div class='container'>
                    <div class='content'>
                        <h1>CFresh</h1>
                        <h2>Thank you for choosing C-Fresh!</h2>
                        <p>Empowering Your Shopping Experience: Seamless Solutions for Every Need.</p>
                        <p class='image-text'>Please click the button below to verify your account:</p>
                        <button class='button'><p><a class='verify-button' href='http://localhost/Cfresh/Customer_register/verify.php?email=$email&verification_code=$verification_code'>Verify Your Account</a></p></button>
                    </div>
                </div>
                <div class='email-footer'>
                    <p>&copy; 2024 C-Fresh. All rights reserved.</p>
                </div>
            </div>
        </body>
        </html>";

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

    // Check for existing email
    $check_email_query = "SELECT COUNT(*) AS CNT FROM USERS WHERE email = :email";
    $stmt_check_email = oci_parse($conn, $check_email_query);
    oci_bind_by_name($stmt_check_email, ':email', $email);
    oci_execute($stmt_check_email);
    $row = oci_fetch_assoc($stmt_check_email);

    if ($row['CNT'] > 0) {
        $_SESSION['message'] = "Email already exists.";
        $_SESSION['message_type'] = 'error';
        header("Location: customer_reg.php");
        exit;
    }
    oci_free_statement($stmt_check_email);

    // Prepare SQL statement for insertion into USERS table
    $sql_users = "INSERT INTO USERS (user_id, user_name, email, password, user_role, first_name, last_name, date_of_birth, phone_number) 
                  VALUES (user_id_seq.NEXTVAL, :email, :email, :password, 'customer', :first_name, :last_name, TO_DATE(:date_of_birth, 'YYYY-MM-DD'), :phone_number)";
    $stmt_users = oci_parse($conn, $sql_users);
    oci_bind_by_name($stmt_users, ':email', $email);
    oci_bind_by_name($stmt_users, ':password', $password);
    oci_bind_by_name($stmt_users, ':first_name', $first_name);
    oci_bind_by_name($stmt_users, ':last_name', $last_name);
    oci_bind_by_name($stmt_users, ':date_of_birth', $date_of_birth);
    oci_bind_by_name($stmt_users, ':phone_number', $phone_number);

    // Execute SQL statement for insertion into USERS table
    if (!oci_execute($stmt_users)) {
        $_SESSION['message'] = "Error inserting into USERS table: " . oci_error($stmt_users);
        $_SESSION['message_type'] = 'error';
        header("Location: customer_reg.php");
        exit;
    }
    // Get the user_id of the newly inserted user from USERS table
    $user_id_query = "SELECT user_id_seq.CURRVAL AS user_id FROM dual";
    $stmt_user_id = oci_parse($conn, $user_id_query);
    oci_execute($stmt_user_id);
    $row = oci_fetch_assoc($stmt_user_id);
    $user_id = $row['USER_ID'];

    // Free statement
    oci_free_statement($stmt_users);
    oci_free_statement($stmt_user_id);

    // Generate verification code
    $verification_code = bin2hex(random_bytes(10));

    // Prepare SQL statement for insertion into CUSTOMER table
    $sql_customer = "INSERT INTO CUSTOMER (user_id, date_joined, verification_code, isVerified) 
                     VALUES (:user_id, SYSDATE, :verification_code, 'N')";
    $stmt_customer = oci_parse($conn, $sql_customer);
    oci_bind_by_name($stmt_customer, ':user_id', $user_id);
    oci_bind_by_name($stmt_customer, ':verification_code', $verification_code);

    // Execute SQL statement for insertion into CUSTOMER table
    if (!oci_execute($stmt_customer)) {
        $_SESSION['message'] = "Error inserting into CUSTOMER table: " . oci_error($stmt_customer);
        $_SESSION['message_type'] = 'error';
        header("Location: customer_reg.php");
        exit;
    }

    if (!sendMail($email, $verification_code)) {
        $_SESSION['message'] = "Error in sending email. Please try again.";
        $_SESSION['message_type'] = 'error';
        header("Location: customer_reg.php");
        exit;
    }

    // Free statement
    oci_free_statement($stmt_customer);


    $_SESSION['message'] = "Account created successfully! Please check your email to verify your account.";
    $_SESSION['message_type'] = 'success';
    header("Refresh: 3; URL= ../login/login.php"); // Delay before redirecting
    exit;
}

oci_close($conn);
?>
