<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C-Fresh Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="login-container">
        <div class="left-side blurred-background">
            <img src="../image/logos.png" alt="C-Fresh Logo" class="logo">
            <h1>Login to your<br>C-Fresh Account</h1>
            <p>Begin purchasing from us and show your<br>support for regional goods.</p>
        </div>
        <div class="right-side">
            <h2>Log In</h2>
            <form action="login_handle.php" method="post">
                <input type="email" placeholder="Email Address" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                <div class="login-as">Login As</div>
                <div class="radio">
                    <input type="radio" id="customer" name="user_role" value="customer" />
                    <label for="customer">Customer</label><br />
                    <input type="radio" id="trader" name="user_role" value="trader" />
                    <label for="trader">Trader</label><br />
                </div>
                <div class="remember-forgot">
                    <label>
                        <input type="checkbox"> Remember me
                    </label>
                    <div>
                        <a href="#">Forgot Password?</a>
                    </div>
                </div>
                <button type="submit">Login</button>
            </form>
            <p class="create-account">Don't have an account? <a href="../Customer_register/customer_reg.php">Create Your Account</a></p>
        </div>
    </div>

    <div id="notification" class="notification"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php
            session_start();
            if (isset($_SESSION['notification'])) {
                $message = $_SESSION['notification']['message'];
                $type = $_SESSION['notification']['type'];
                echo "showNotification('$message', '$type');";
                unset($_SESSION['notification']);
            }
            ?>
        });

        function showNotification(message, type) {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.className = `notification ${type}`;
            notification.style.display = 'block';
            setTimeout(() => {
                notification.style.display = 'none';
                if (type === 'success') {
                    window.location.href = '../home/index.php';
                }
            }, 3000);
        }
    </script>
</body>

</html>
