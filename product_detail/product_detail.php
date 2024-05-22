<?php include ('../connect.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../product_detail/product_detail.css">
</head>

<body>

</body>

</html>

<?php include ('../header/header.php') ?>

<?php

$product_id = $_GET['ID'];

$product_query = "SELECT * FROM PRODUCT WHERE PRODUCT_ID = '$product_id'";

$product_stmt = oci_parse($conn, $product_query);

oci_execute($product_stmt);

while ($row = oci_fetch_assoc($product_stmt)) {

    $shop_id = $row['SHOP_ID'];

    $shop_query = "SELECT * FROM SHOP WHERE SHOP_ID = '$shop_id'";
    $shop_stmt = oci_parse($conn, $shop_query);

    oci_execute($shop_stmt);

    $shop_row = oci_fetch_assoc($shop_stmt);

    ?>
    <section class="product-section">
        <div class="custom-container">
            <div class="main-container">

                <div class="product-container">
                    <div class="main-image">
                        <img src="../image/<?php echo $row['PRODUCT_IMAGE']; ?>" alt="<?php echo $row['PRODUCT_NAME']; ?>">
                    </div>
                </div>

                <div class="text-container">
                    <div class="head">
                        <div class="image">
                            <img src="../image/<?php echo $shop_row['SHOP_LOGO']; ?>" alt="image">
                        </div>
                        <div class="text">
                            <h4><?php echo $shop_row['SHOP_NAME']; ?></h4>
                            <h5><?php echo $shop_row['SHOP_DESCRIPTION']; ?></h5>
                        </div>
                    </div>
                    <div class="details">
                        <h2 class="product-name"><?php echo $row['PRODUCT_NAME']; ?></h2>
                        <!-- <h4 class="kg">1kg</h4> -->
                        <h2 style="color: #323E6B;font-weight: 900;">£ <?php echo $row['PRICE']; ?></h2>
                        <h4 class="stocks">Avaliable Stocks : <?php echo $row['STOCK_AVAILABLE']; ?></h4>
                    </div>
                    <div class="quantity">
                        <button id="decrement">-</button>
                        <input type="text" id="quantity" value="1" readonly style="width: 30px; text-align: center;">
                        <button id="increment">+</button>
                    </div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const incrementButton = document.getElementById('increment');
    const decrementButton = document.getElementById('decrement');
    const quantityField = document.getElementById('quantity');

    incrementButton.addEventListener('click', function() {
        let currentValue = parseInt(quantityField.value, 10);
        currentValue++;
        quantityField.value = currentValue;
    });

    decrementButton.addEventListener('click', function() {
        let currentValue = parseInt(quantityField.value, 10);
        if (currentValue > 1) { // Prevents the quantity from going below 1
            currentValue--;
            quantityField.value = currentValue;
        }
    });
});
</script>




                    <div class="buttons">
                        <a class="cart">Add to cart</a>
                        <a class="list">Add to list</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="description-section">
        <div class="custom-container">
            <div class="text">
                <h2>Description :</h2>
                <!-- <p>Discover the Juicy Sweetness of Fresh Strawberries! Handpicked at peak ripeness for maximum flavor. Perfect for snacking, baking, or blending into refreshing treats. Explore our selection and taste the difference today!Handpicked at the peak of ripeness, each strawberry embodies the essence of sun-kissed fields and tender care. Whether enjoyed fresh as a wholesome snack, atop decadent desserts, or blended into refreshing smoothies, our strawberries promise a delightful culinary adventure
            Discover the Juicy Sweetness of Fresh Strawberries! Handpicked at peak ripeness for maximum flavor. Perfect for snacking, baking, or blending into refreshing treats. Explore our selection and taste the difference today!Handpicked at the peak of ripeness, each strawberry embodies the essence of sun-kissed fields and tender care. Whether enjoyed fresh as a wholesome snack, atop decadent desserts, or blended into refreshing smoothies, our strawberries promise a delightful culinary adventure.</p> -->
                <p><?php echo $row['DESCRIPTION']; ?></p>
            </div>



            <div class="text">
                <div class="rating">
                    <h2>Add Rating :</h2>
                    <a class="star-btn">Add stars</a>
                </div>
                <div class="stars">
                    <img src="../image/product/star.png" alt="">
                    <img src="../image/product/star.png" alt="">
                    <img src="../image/product/star.png" alt="">
                    <img src="../image/product/star.png" alt="">
                    <img src="../image/product/star.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="comment-section">
        <div class="custom-container">
            <h2>Comments :</h2>
            <div class="comment">
                <p> <span>Ram</span> :Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec justo eget magna
                    fermentum iaculis.
                <p>
            </div>
            <div class="comment">
                <p> <span>Ram</span> :Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec justo eget magna
                    fermentum iaculis.
                <p>
            </div>
            <div class="comment">
                <p> <span>Ram</span> :Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec justo eget magna
                    fermentum iaculis.
                <p>
            </div>
            <div class="review-container">
                <div class="review">
                    <textarea name="" id="" cols="30" rows="10" placeholder="Write your comment....."></textarea>
                </div>
                <div class="add-review">
                    <a class="add-btn">Add Review</a>
                </div>
            </div>
        </div>
    </section>




    <section class="more-products-section">
        <div class="custom-container">


            <?php
            $product_limit = 0;
            $shop_id = $row['SHOP_ID'];

            $shop_product_query = "SELECT * FROM PRODUCT WHERE SHOP_ID = '$shop_id' AND PRODUCT_ID != '$product_id'";
            $shop_product_stmt = oci_parse($conn, $shop_product_query);

            oci_execute($shop_product_stmt); ?>

            <div class="heading">
                <h2 style="color: #323E6B;">More from this shop</h2>
                <a href="../shop_detail/shop_detail.php?ID=<?php echo $row['SHOP_ID']; ?>">See all ></a>
            </div>
            <div class="item-container">
                <?php
                while (($shop_product_row = oci_fetch_assoc($shop_product_stmt)) && $product_limit < 5) {

                    ?>

                    <div class="item">
                        <a href="../product_detail/product_detail.php?ID=<?php echo $shop_product_row['PRODUCT_ID']; ?>">
                            <div class="image-container">
                                <img src="../image/<?php echo $shop_product_row['PRODUCT_IMAGE']; ?>">
                            </div>
                            <div class="text">
                                <h4><?php echo $shop_product_row['PRODUCT_NAME']; ?></h4>
                                <!-- <h5>3 lb bag</h5> -->
                                <h4>£ <?php echo $shop_product_row['PRICE']; ?></h4>
                            </div>
                            <div class="button">
                                <form method="POST" action="../cartpage/add_to_cart.php">
                                    <input type="hidden" name="product_id" value="<?php echo $shop_product_row['PRODUCT_ID']; ?>">
                                    <button type="submit" class="add-btn">ADD +</button>
                                </form>
                            </div>
                        </a>
                    </div>
                    <?php $product_limit++;
                } ?>
            </div>
        </div>
    <?php } ?>
</section>

<?php include ('../footer/footer.php') ?>