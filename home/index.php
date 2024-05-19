<?php include ('../connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
</head>
<?php include ('../header/header.php') ?>
<body>
<div class="hero-section">
    <div class="slider">
        <img src="images/banner1.jpg" alt="Local Market" class="slide active">
        <img src="images/banner2.jpg" alt="Second Image" class="slide">
        <img src="images/banner3.jpg" alt="Second Image" class="slide">
        <img src="images/banner4.jpg" alt="Third Image" class="slide">
    </div>
</div>
<script>
    let slideIndex = 0; // Start with the first image
    showSlides();

    function showSlides() {
        let slides = document.getElementsByClassName("slide");
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
            slides[i].className = slides[i].className.replace(" active", "");
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        slides[slideIndex-1].style.display = "block";  
        slides[slideIndex-1].className += " active";
        setTimeout(showSlides, 3000); // Change image every 3 seconds
    }
</script>



    <div class="trending-products">
    <h2>Trending Products</h2>
        <div class="container">

            <?php

            $product_limit = 0;

            $query = "SELECT * FROM PRODUCT ORDER BY DBMS_RANDOM.VALUE";

            $result = oci_parse($conn, $query);
            oci_execute($result);

            while (($row = oci_fetch_assoc($result)) && $product_limit < 4) {
                ?>
            
                <div class="card">
                    <div class="img-div">
                        <img src="../image/<?php echo $row['PRODUCT_IMAGE']; ?>" alt="<?php echo $row['PRODUCT_NAME']; ?>">
                    </div>
                    <div>
                        <h2><?php echo $row['PRODUCT_NAME']; ?></h2>
                        <!-- <p><?php echo $row['DESCRIPTION']; ?></p> -->
                        <p class="rate" style="font-weight:400;"><?php echo 'Rs ' . $row['PRICE']; ?></p>
                    </div>
                    <div class="btn-div">
                        <a href="../cartpage.Cart.html" class="add-btn">ADD +</a>
                    </div>
                </div>
            
                <?php $product_limit++;
            } ?>

        </div>
    </div>


    <div class="offer-products">
        <h2>Shops</h2>
        <div class="container">
            <div class="card">
                <a href="../shop_detail/harefieldfarm.php">
                <div class="img-div">
                    <img src="images/dummy-image-square.jpg" alt="">
                    <div class="logo-div">
                        <img src="images/Hfield.png" alt="">
                    </div>
                </div>
                <h2>Harefield farms</h2>
                <p>For veggies</p>
                </a>
            </div>
            <div class="card">
                <a href="../shop_detail/dryclough.php">
                <div class="img-div">
                    <img src="images/dummy-image-square.jpg" alt="">
                    <div class="logo-div">
                        <img src="images/Butcher 1.png" alt="">
                    </div>
                </div>
                <h2>Dryclough Butchers</h2>
                <p>For meats</p>
                </a>
            </div>
            <div class="card">
                <a href="../shop_detail/vitrition.php">
                <div class="img-div">
                    <img src="images/dummy-image-square.jpg" alt="">
                    <div class="logo-div">
                        <img src="images/FISH 1.png" alt="">
                    </div>
                </div>
                <h2>Vitrition</h2>
                <p>For Dairy and Bakery</p>
                </a>
            </div>
            <div class="card">
                <a href="../shop_detail/barrie.php">
                <div class="img-div">
                    <img src="images/dummy-image-square.jpg" alt="">
                    <div class="logo-div">
                        <img src="images/B.png" alt="">
                    </div>
                </div>
                <h2>Barrie Petinger</h2>
                <p>For Fish</p>
                </a>
            </div>
        </div>
    </div>


    <div class="products">
        <div class="heading">
            <h2>Offer Products</h2>
        </div>
        <div class="container">
            <div class="card">
                <div class="img-div">
                    <img src="images/Frame 7286.png" alt="">
                </div>
                <div>
                    <h2>Whole Wheat Bread</h2>
                    <p>1 loaf</p>
                    <p class="rate">€1.50</p>
                </div>
                <div class="btn-div">
                <a href="../cartpage/Cart.html" class="add-btn">ADD +</a>
                </div>
            </div>
            <div class="card">
                <div class="img-div">
                    <img src="images/Frame 7286.png" alt="">
                </div>
                <div>
                    <h2>Organic Bananas</h2>
                    <p>5 lb bunch</p>
                    <p class="rate">€3.50</p>
                </div>
                <div class="btn-div">
                <a href="../cartpage/Cart.html" class="add-btn">ADD +</a>
                </div>
            </div>
            <div class="card">
                <div class="img-div">
                    <img src="images/Frame 7286.png" alt="">
                </div>
                <div>
                    <h2>Red Onions</h2>
                    <p>2 lb bag</p>
                    <p class="rate">€1.75</p>
                </div>
                <div class="btn-div">
                <a href="../cartpage/Cart.html" class="add-btn">ADD +</a>
                </div>
            </div>
            <div class="card">
                <div class="img-div">
                    <img src="images/Frame 7286.png" alt="">
                </div>
                <div>
                    <h2>Turkey Sausage</h2>
                    <p>1 lb</p>
                    <p class="rate">€3.99</p>
                </div>
                <div class="btn-div">
                <a href="../cartpage/Cart.html" class="add-btn">ADD +</a>
                </div>
            </div>
            <div class="card">
                <div class="img-div">
                    <img src="images/Frame 7286.png" alt="">
                </div>
                <div>
                    <h2>Fresh Roma Tomato</h2>
                    <p>3 lb bag</p>
                    <p class="rate">€20.00</p>
                </div>
                <div class="btn-div">
                <a href="../cartpage/Cart.html" class="add-btn">ADD +</a>
                </div>
            </div>
        </div>
    </div>


    <div class="products">
        <div class="heading">
            <h2>Other Products</h2>
            <div class="see-all">
                <a href="../allproducts/allproducts.php">See all <svg viewBox="0 0 320 512"><path fill="#FF0000" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/></svg></a>
            </div>
        </div>
        <div class="container">
            <?php

                $product_limit = 0;

            $query = "SELECT * FROM PRODUCT ORDER BY DBMS_RANDOM.VALUE";

                $result = oci_parse($conn, $query);
                oci_execute($result);

                while (($row = oci_fetch_assoc($result)) && $product_limit<10) {
                ?>
            
                <div class="card">
                    <div class="img-div">
                        <img src="../image/<?php echo $row['PRODUCT_IMAGE']; ?>" alt="<?php echo $row['PRODUCT_NAME']; ?>">
                    </div>
                    <div>
                        <h2><?php echo $row['PRODUCT_NAME']; ?></h2>
                        <!-- <p><?php echo $row['DESCRIPTION']; ?></p> -->
                        <p class="rate" style="font-weight:400;"><?php echo 'Rs ' . $row['PRICE']; ?></p>
                    </div>
                    <div class="btn-div">
                        <a href="../cartpage.Cart.html" class="add-btn">ADD +</a>
                    </div>
                </div>
            
            <?php $product_limit++; } ?>
        </div>
    </div>

</body>
<?php include ('../footer/footer.php') ?>
</html>