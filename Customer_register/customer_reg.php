<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="customer_reg.css">
</head>

<body>
    <div class="container">
        <div class="left-side">
            <img src="../image/login-register/logo.png" alt="C-Fresh Logo" class="logo">
            <h1>Create your <br>C-Fresh Account</h1>
            <p>Begin purchasing from us and show your support for regional goods.</p>
        </div>
        <div class="right-side">
<<<<<<< HEAD
        <form action="insert_data.php" method="post">
=======
            <form method="post" action="register.php">
>>>>>>> 6da1ddd1d5dac43484ccbdcc9bac68b0c5ce5d55
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
<<<<<<< HEAD
=======
                    <div class="form-control">
                        <select id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
>>>>>>> 6da1ddd1d5dac43484ccbdcc9bac68b0c5ce5d55
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
                    Already have an account? <a href="#">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
