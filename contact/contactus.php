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
<?php include ('../header/header.php') ?>

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

    <script src="script.js"></script>
