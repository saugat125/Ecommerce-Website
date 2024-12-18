<?php
include ('../connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="../aboutus/aboutus.css">
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

<div class="header">
    <h1>C-Fresh</h1>
    <div class="about-us">ABOUT US</div> 
</div>




<section class="introduction">
    <div class="section-content">
        <div class="section-text">
            <h3><i>Introduction</i></h3>
            <p><b>At C-Fresh, we are dedicated to bringing you the freshest and finest ingredients right to your doorstep. Our mission is to empower your culinary adventures with high-quality groceries, sourced responsibly and sustainably. Whether you're cooking a simple meal for one or a feast for the whole family, our carefully curated selection ensures that you have access to the best produce, meats, dairy, and more—all year round.</b></p>
        </div>
        <div class="section-image">
            <img src="Establishment.jpeg" alt="Introduction Image">
        </div>
    </div>
</section>

<!-- Establishment Section -->
<section class="establishment">
    <div class="section-content">
        <div class="section-text">
            <h3><i>Establishment</i></h3>
            <p><b>Founded in 2024, C-Fresh sprang from a commitment to enhance well-being through sustainable and high-quality groceries. Our roots are deeply planted in supporting local agriculture and promoting eco-friendly products. We started as a modest venture to connect conscientious consumers with the finest, ethically sourced ingredients and have grown into a trusted name in the health-conscious community. At [Your Brand Name], we continue to champion the cause of sustainable living, nurturing our vision of a healthier, greener future for all.</b></p>
        </div>
        <div class="section-image">
            <img src="Establishment.jpeg" alt="Establishment Image">
        </div>
    </div>
</section>

<div class="testimonials-carousel">
    <div class="testimonial-slide">
        <!-- Testimonial 1 -->
        <div class="testimonial">
            <div class="testimonial-content">
                <img src="profile1.jpg" alt="Profile Picture">
                <h3>John Doe</h3>
                <div class="rating">
                    <span class="material-icons">star</span>
                    <span class="material-icons">star</span>
                    <span class="material-icons">star</span>
                    <span class="material-icons">star_half</span>
                </div>
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit."</p>
            </div>
        </div>

        <!-- Testimonial 2 -->
        <div class="testimonial">
            <div class="testimonial-content">
                <img src="profile2.jpg" alt="Profile Picture">
                <h3>Jane Smith</h3>
                <div class="rating">
                    <span class="material-icons">star</span>
                    <span class="material-icons">star</span>
                    <span class="material-icons">star</span>
                    <span class="material-icons">star</span>
                </div>
                <p>"Vestibulum id urna vel magna mollis laoreet."</p>
            </div>
        </div>

        <!-- Testimonial 3 -->
        <div class="testimonial">
            <div class="testimonial-content">
                <img src="profile3.jpg" alt="Profile Picture">
                <h3>Emily Johnson</h3>
                <div class="rating">
                    <span class="material-icons">star</span>
                    <span class="material-icons">star</span>
                    <span class="material-icons">star</span>
                </div>
                <p>"Nullam feugiat metus sit amet arcu congue."</p>
            </div>
        </div>

        <!-- Testimonial 4 -->
        <div class="testimonial">
            <div class="testimonial-content">
                <img src="profile4.jpeg" alt="Profile Picture">
                <h3>Alice Johnson</h3>
                <div class="rating">
                    <span class="material-icons">star</span>
                    <span class="material-icons">star</span>
                    <span class="material-icons">star_half</span>
                </div>
                <p>"Fusce vel turpis id nisi semper malesuada."</p>
            </div>
        </div>

        <!-- Testimonial 5 -->
        <div class="testimonial">
            <div class="testimonial-content">
                <img src="profile5.jpeg" alt="Profile Picture">
                <h3>Michael Brown</h3>
                <div class="rating">
                    <span class="material-icons">star</span>
                    <span class="material-icons">star</span>
                    <span class="material-icons">star</span>
                    <span class="material-icons">star</span>
                    <span class="material-icons">star_half</span>
                </div>
                <p>"Proin convallis nunc eu quam aliquet, id eleifend mauris varius."</p>
            </div>
        </div>

        <!-- Testimonial 6 -->
        <div class="testimonial">
            <div class="testimonial-content">
                <img src="profile6.jpeg" alt="Profile Picture">
                <h3>Sarah Williams</h3>
                <div class="rating">
                    <span class="material-icons">star</span>
                    <span class="material-icons">star</span>
                    <span class="material-icons">star</span>
                </div>
                <p>"Integer a elit eget justo convallis ullamcorper."</p>
            </div>
        </div>
    </div>

    <!-- Navigation Arrows -->
    <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
    <button class="next" onclick="changeSlide(1)">&#10095;</button>
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

<script src="AboutUs.js"></script>