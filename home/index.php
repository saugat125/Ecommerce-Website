<?php
include ('../connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <?php
    if (isset($_SESSION['user_id'])) {
        include('../header/home_header.php');
    } else {
        include('../header/header.php');
    }
    ?>
    <div class="hero-section">
        <div class="slider">
            <img src="images/banner1.jpg" alt="Local Market" class="slide active">
            <img src="images/banner2.jpg" alt="Second Image" class="slide">
            <img src="images/banner3.jpg" alt="Second Image" class="slide">
            <img src="images/banner4.jpg" alt="Third Image" class="slide">
        </div>
    </div>
    <script>
        let slideIndex = 0;
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
            setTimeout(showSlides, 3000);
        }
    </script>

    <div class="trending-products">
        <h2>Trending Products</h2>
        <div class="container">
            <?php
            $product_limit = 0;
            $query = "SELECT * FROM PRODUCT WHERE ISAPPROVED = 'Y' ORDER BY DBMS_RANDOM.VALUE";
            $result = oci_parse($conn, $query);
            oci_execute($result);
            while (($row = oci_fetch_assoc($result)) && $product_limit < 4) {
            ?>
                <div class="card">
                    <a href="../product_detail/product_detail.php?ID=<?php echo $row['PRODUCT_ID']; ?>">
                    <div class="img-div">
                        <img src="../image/<?php echo $row['PRODUCT_IMAGE']; ?>" alt="<?php echo $row['PRODUCT_NAME']; ?>">
                    </div>
                    <div>
                        <h2><?php echo $row['PRODUCT_NAME']; ?></h2>
                        <p class="rate" style="font-weight:400;"><?php echo 'Rs ' . $row['PRICE']; ?></p>
                    </div>
                    <div class="btn-div">
                        <form method="POST" action="../cartpage/add_to_cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $row['PRODUCT_ID']; ?>">
                            <button type="submit" class="add-btn">ADD +</button>
                        </form>                    
                    </div>
                    </a>
                </div>
            <?php
                $product_limit++;
            } ?>
        </div>
    </div>

    <div class="offer-products">
        <h2>Shops</h2>
        <div class="container">
            <?php
            $query = "SELECT * FROM SHOP";
            $result = oci_parse($conn, $query);
            oci_execute($result);
            while ($row = oci_fetch_assoc($result)) {
            ?>
                <div class="card">
                    <a href="../shop_detail/shop_detail.php?ID=<?php echo $row['SHOP_ID']; ?>">
                        <div class="img-div">
                            <img src="../image/<?php echo $row['SHOP_IMAGE']; ?>" alt="">
                            <div class="logo-div">
                                <img src="../image/<?php echo $row['SHOP_LOGO']; ?>" alt="">
                            </div>
                        </div>
                        <h2><?php echo $row['SHOP_NAME']; ?></h2>
                        <p><?php echo $row['SHOP_DESCRIPTION']; ?></p>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="products">
        <div class="heading">
            <h2>Offer Products</h2>
        </div>
        <div class="container">

            <?php
                $product_limit = 0;
                $offer_query = "SELECT * FROM PRODUCT WHERE DISCOUNT > 0 AND ISAPPROVED = 'Y'" ;

                $offer_stmt = oci_parse($conn, $offer_query);
                oci_execute($offer_stmt);

                while (($offer_row = oci_fetch_assoc($offer_stmt)) && $product_limit<5){

            ?>

            <div class="card">
                <a href="../product_detail/product_detail.php?ID=<?php echo $offer_row['PRODUCT_ID']; ?>">
                <div class="img-div">
                    <img src="../image/<?php echo $offer_row['PRODUCT_IMAGE']; ?>" alt="<?php echo $offer_row['PRODUCT_NAME']; ?>">
                </div>
                <div>
                    <h2><?php echo $offer_row['PRODUCT_NAME']; ?></h2>
                    <p class="rate">€ <?php echo $offer_row['PRICE']; ?></p>
                </div>
                <div class="btn-div">
                    <form method="POST" action="../cartpage/add_to_cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $offer_row['PRODUCT_ID']; ?>">
                        <button type="submit" class="add-btn">ADD +</button>
                    </form>                    
                </div>
                </a>
            </div>
            <?php $product_limit++; } ?>
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
            $query = "SELECT * FROM PRODUCT WHERE ISAPPROVED = 'Y' ORDER BY DBMS_RANDOM.VALUE";
            $result = oci_parse($conn, $query);
            oci_execute($result);
            while (($row = oci_fetch_assoc($result)) && $product_limit < 10) {
            ?>
                <div class="card">
                    <a href="../product_detail/product_detail.php?ID=<?php echo $row['PRODUCT_ID']; ?>">
                    <div class="img-div">
                        <img src="../image/<?php echo $row['PRODUCT_IMAGE']; ?>" alt="<?php echo $row['PRODUCT_NAME']; ?>">
                    </div>
                    <div>
                        <h2><?php echo $row['PRODUCT_NAME']; ?></h2>
                        <p class="rate" style="font-weight:400;"><?php echo 'Rs ' . $row['PRICE']; ?></p>
                    </div>
                    <div class="btn-div">
                        <form method="POST" action="../cartpage/add_to_cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $row['PRODUCT_ID']; ?>">
                            <button type="submit" class="add-btn">ADD +</button>
                        </form>                    
                    </div>
                    </a>
                </div>
            <?php
                $product_limit++;
            } ?>
        </div>
    </div>

</body>
<?php include ('../footer/footer.php') ?>
</html>
