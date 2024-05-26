<?php
include ('../connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Terms and Conditions</title>
<link rel="stylesheet" href="T&M.css">
</head>

<?php
if (isset($_SESSION['user_id'])) {
  include ('../header/home_header.php');
} else {
  include ('../header/header.php');
}
?>

<body>


<div class="container">
    <h1>Terms and Conditions</h1>

    <div id="termsContent" class="terms-content">
        <div class="section">
            <div class="section-title">1. Introduction</div>
            <div class="section-content">
                <p>Welcome to CFresh. By accessing or using our website, you agree to be bound by these Terms and Conditions. If you do not agree with any part of these terms, you must not use our website.</p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">2. Use of Website</div>
            <div class="section-content">
                <p>a. You must be at least 13 years old to use our website. By using our website, you represent that you are at least 13 years old.</p>
                <p>b. You agree to use our website for lawful purposes only and in a way that does not infringe the rights of, restrict, or inhibit anyone else's use and enjoyment of the website.</p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">3. Intellectual Property</div>
            <div class="section-content">
                <p>a. All content included on this site, such as text, graphics, logos, images, and software, is the property of CFresh or its content suppliers and protected by international copyright laws.</p>
                <p>b. You may not reproduce, distribute, or create derivative works from any content on our website without our prior written consent.</p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">4. Limitation of Liability</div>
            <div class="section-content">
                <p>a. CFresh will not be liable for any damages of any kind arising from the use of this site, including but not limited to direct, indirect, incidental, punitive, and consequential damages.</p>
                <p>b. We do not warrant that the website will be uninterrupted or error-free, and we will not be liable for any interruptions or errors.</p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">5. Privacy Policy</div>
            <div class="section-content">
                <p>Your use of our website is also governed by our Privacy Policy, which you can view <a href="#">here</a>.</p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">6. Changes to Terms and Conditions</div>
            <div class="section-content">
                <p>We reserve the right to change these Terms and Conditions at any time. Any changes will be posted on this page. Your continued use of the website after such changes constitutes your acceptance of the new Terms and Conditions.</p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">7. Governing Law</div>
            <div class="section-content">
                <p>These terms and conditions are governed by and construed in accordance with the laws of the United Kingdom, and you irrevocably submit to the exclusive jurisdiction of the courts in that State or location.</p>
            </div>
        </div>
    </div>
</div>

    <footer>
        <div class="footer-container">
          <div class="footer-left">
            <ul>
              <li><a href="#">Overview</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Privacy policy</a></li>
              <li><a href="#">Terms & Conditions</a></li>
              <li><a href="#">FAQs</a></li>
            </ul>
          </div>
          <div class="footer-middle">
            <ul>
              <li><a href="#">Available Shops</a></li>
              <li>Haricekts Farm</li>
              <li>Dyreborn Holland</li>
              <li>Vitrion</li>
              <li>Barne Pettinger</li>
            </ul>
          </div>
          <div class="footer-right">
            <ul>
              <li><a href="#">Shop by Category</a></li>
              <li>Vegetables</li>
              <li>Fruits</li>
              <li>Meat & Fish</li>
              <li>Dairy and Bakery</li>
            </ul>
          </div>
          <div class="footer-contact">
            <p>Contact Us</p>
            <p>+977-9857011098</p>
            <p>info@c-fresh.com</p>
            <p>Clostkhodesfax, UK</p>
            <div class="social-icons">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
        <div class="copyright">
          <p>&copy; 2024 - C-Fresh. All Rights Reserved.</p>
        </div>
    </footer>

<script src="T&M.js"></script>
</body>
</html>
