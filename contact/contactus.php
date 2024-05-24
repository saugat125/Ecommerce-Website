<?php
include ('../connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <link rel="stylesheet" href="../contact/contactus.css">
</head>
<body>
    
</body>
</html>
<?php
    if (isset($_SESSION['user_id'])) {
        include('../header/home_header.php');
    } else {
        include('../header/header.php');
    }
    ?>
<section class="contact-us">
    <div class="contact-heading">
        <h2>Contact Us</h2>
    </div>
</section>

    <div class="container">
        <div class="form-container">
            <h2>Contact Us</h2>
            <form id="contactForm">
                <div class="form-group-inline">
                    <div class="form-group">
                        <label for="address">Address </label>
                        <input type="text" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile </label>
                        <input type="text" id="mobile" name="mobile" required>
                    </div>
                </div>
                <div class="form-group-inline">
                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time </label>
                        <input type="text" id="time" name="time">
                    </div>
                </div>
                <div class="form-group">
                    <h3>Drop us a line</h3>
                    <div class="form-group-inline">
                        <div class="form-group">
                            <input type="text" id="name" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" id="senderEmail" name="senderEmail" placeholder="Your Email" required>
                        </div>
                    </div>
                    <textarea id="message" name="message" rows="5" required placeholder="Your message"></textarea>
                </div>
                <div class="button-container">
                    <button type="submit" id="submitBtn">Send</button>
                </div>
            </form>
        </div>
        <div class="image-container">
            <img src="../image/Full_logo.png" alt="Placeholder Image">
        </div>
    </div>

    <footer>
    <div class="footer-container">
        <div class="footer-left">
            <ul>
                <h3>Overview</h3>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Privacy policy</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">FAQs</a></li>
            </ul>
        </div>
        <div class="footer-middle">
            <ul>
                <h3>Available Shops</h3>
                <li>Haricekts Farm</li>
                <li>Dyreborn Holland</li>
                <li>Vitrion</li>
                <li>Barne Pettinger</li>
            </ul>
        </div>
        <div class="footer-right">
            <ul>
                <h3>Shop by Category</h3>
                <li>Vegetables</li>
                <li>Fruits</li>
                <li>Meat & Fish</li>
                <li>Dairy and Bakery</li>
            </ul>
        </div>
        <div class="footer-contact">
            <h3>Contact Us</h3>
            <p>+977-9857011098</p>
            <p>info@c-fresh.com</p>
            <p>Clostkhodesfax, UK</p>
            <h3>Social</h3>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p>&copy; 2024 - C-Fresh. All Rights Reserved.</p>
    </div>
</footer>
