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

<section class="contact-us">
    <div class="contact-heading">
        <h2>Contact Us</h2>
    </div>
</section>

    <div class="container">
        <div class="form-container">
            <h2 style="margin-bottom:30px;">Contact Us</h2>
            <form id="contactForm">
            <div class="form-group-inline">
    <div class="form-group">
        <label for="name">Name </label>
        <input type="text" id="name" name="name" required>
    </div>
</div>
        <div class="form-group-inline">
            <div class="form-group">
                <label for="email">Email </label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number </label>
                <input type="text" id="phone" name="phone">
            </div>
        </div>
        <div class="form-group">
            <label for="message">Your message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
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

    <?php include ('../footer/footer.php') ?>
