<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="customer_reg.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="left-side blurred-background">
            <img src="../image/logos.png" alt="C-Fresh Logo" class="logo">
            <h1>Login to your<br>C-Fresh Account</h1>
            <p>Begin purchasing from us and show your<br>support for regional goods.</p>
        </div>
        <div class="right-side">
        <form action="register.php" method="post">
                <h1>Create Account</h1>
                <div class="form-group">
                    <div class="form-control">
                        <input type="text" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="form-control">
                        <input type="text" name="last_name" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <input type="email" id="email" name="email" placeholder="Email Address" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <input type="date" id="date-of-birth" name="date_of_birth" placeholder="Date of Birth"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <input type="tel" id="phone-number" name="phone_number" placeholder="Phone Number" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <input type="password" id="confirm-password" name="confirm_password"
                            placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="form">
                    <div class="terms">
                        <label>
                            <input type="checkbox" name="terms_and_conditions" required>
                            Terms and Conditions.
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn">Create a new account</button>
                <div class="login-link">
                    Already have an account? <a href="../login/login.php">Login</a>

                </div>
            </form>
        </div>
    </div>

    <?php if (isset($_SESSION['message'])): ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            <?php if ($_SESSION['message_type'] == 'success'): ?>
                toastr.success("<?php echo $_SESSION['message']; ?>");
            <?php else: ?>
                toastr.error("<?php echo $_SESSION['message']; ?>");
            <?php endif; ?>
            <?php unset($_SESSION['message']); ?>
            <?php unset($_SESSION['message_type']); ?>
        </script>
    <?php endif; ?>

</body>
</html>
