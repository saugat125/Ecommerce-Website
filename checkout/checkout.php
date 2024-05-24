<?php
include ('../connect.php');
include('../notification.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C-Fresh</title>
    <link rel="stylesheet" href="checkout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header>
<?php
    if (isset($_SESSION['user_id'])) {
        include('../header/home_header.php');
    } else {
        include('../header/header.php');
    }
    ?>

    <main>
        <section class="collection-slots">
            <h2>Collection Slots</h2>
            <div class="time-slot">
                <label for="time">Time:</label>
                <select id="time">
                    <option value="">Select Time >></option>
                    <!-- Add time options here -->
                </select>
            </div>
            <div class="day-slot">
                <label for="day">Day:</label>
                <select id="day">
                    <option value="">Select Days >></option>
                    <!-- Add day options here -->
                </select>
            </div>
        </section>

        <section class="product-list">
            <!-- New product row for Apple -->
            <div class="product-row">
                <div class="product-name">Product image</div>
                <div class="product-name">Product name</div>
                <div class="product-quantity">Quantity</div>
                <div class="product-price">£ Price</div>
            </div>
            <!-- Existing product row for Potato -->
            <div class="product-row">
                <div class="product-name"></div>
                <div class="product-name">Potato</div>
                <div class="product-quantity">1kg</div>
                <div class="product-price">£ 100</div>
            </div>
            <div class="product-row">
                <div class="product-name"></div>
                <div class="product-name">Mango</div>
                <div class="product-quantity">1kg</div>
                <div class="product-price">£ 100</div>
            </div>
            <div class="product-row">
                <div class="product-name"></div>
                <div class="product-name">Apple</div>
                <div class="product-quantity">1kg</div>
                <div class="product-price">£ 100</div>
            </div>
            <!-- Add more product rows here -->
        </section>

        <section class="order-summary">
            <h2>Order Summary</h2>
            <div class="total-items">Total Items: <span>3(Items)</span></div>
            <div class="total-payment">Total Payment: <span>Total : £ 300</span></div>
            <button class="place-order">Place Order</button>
        </section>
    </main>

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

    

    
</body>
</html>
