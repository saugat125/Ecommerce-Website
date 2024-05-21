<?php include ('../connect.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="shop_detail.css">
</head>
<?php include ('../header/header.php') ?>

<body>

    <?php

        $shop_id = $_GET['ID'];

        $shop_query = "SELECT * FROM SHOP WHERE SHOP_ID = '$shop_id'";
        $product_query = "SELECT * FROM PRODUCT WHERE SHOP_ID = '$shop_id'";

        $shop_stmt = oci_parse($conn, $shop_query);
        $product_stmt = oci_parse($conn, $product_query);

        oci_execute($shop_stmt);
        oci_execute($product_stmt);

        while ($row = oci_fetch_assoc($shop_stmt)){

    ?>

    <div class="cover-container">
        <!-- <img src="../home/images/Hfield.png" alt="Farm Background" class="cover-image"> -->
        <img src="../image/<?php echo $row['SHOP_IMAGE']; ?>"  class="cover-image" alt="image">
        <div class="profile-container">
            <!-- <img src="../home/images/B.png" alt="Harefield Farm Logo" class="profile-image"> -->
            <img src="../image/<?php echo $row['SHOP_LOGO']; ?>" class="profile-image" alt="image">
        </div>
    </div>
    <div class="description-container">
        <h1><?php echo $row['SHOP_NAME']; ?></h1>
        <p><?php echo $row['ADDRESS']; ?></p>
        <p><?php echo $row['SHOP_DESCRIPTION']; ?></p>
    </div>
    <?php } ?>
    
    <?php
        while ($row = oci_fetch_assoc($product_stmt)){
    ?>
    <div class="trending-products">
        <div class="container">
            <div class="card">
                <div class="img-div">
                    <img src="../image/<?php echo $row['PRODUCT_IMAGE']; ?>" alt="<?php echo $row['PRODUCT_NAME']; ?>">
                </div>
                <div>
                    <h2><?php echo $row['PRODUCT_NAME']; ?></h2>
                    <!-- <p>2 lb bag</p> -->
                    <p class="rate">€ <?php echo $row['PRICE']; ?></p>
                </div>
                <div class="btn-div">
                <a href="../cartpage/Cart.html" class="add-btn">ADD +</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    
</body>
<?php include ('../footer/footer.php') ?>
</html>
