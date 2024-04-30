<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../aboutus/aboutus.css">
</head>
<body>
    
</body>
</html>


<?php include ('../header/header.php') ?>

<section class="about-us">
    <div class="about-heading">
        <h2>About Us</h2>
    </div>
</section>

<section class="introduction">
    <div class="section-content">
        <div class="section-text">
            <h3>Introduction</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ultricies, tortor et ullamcorper commodo,
                libero justo dignissim nisl.</p>
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
            <h3>Establishment</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ultricies, tortor et ullamcorper commodo,
                libero justo dignissim nisl.</p>
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