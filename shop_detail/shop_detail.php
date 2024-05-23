<?php
include ('../connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="shop_detail.css">
</head>
<?php
    if (isset($_SESSION['user_id'])) {
        include('../header/home_header.php');
    } else {
        include('../header/header.php');
    }
    ?>
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
    
    
    <div class="trending-products">
        <div class="container">
            <?php
                while ($row = oci_fetch_assoc($product_stmt)) {
            ?>
            <div class="card">
                <a href="../product_detail/product_detail.php?ID=<?php echo $row['PRODUCT_ID']; ?>">
                <div class="img-div">
                    <img src="../image/<?php echo $row['PRODUCT_IMAGE']; ?>" alt="<?php echo $row['PRODUCT_NAME']; ?>">
                </div>
                <div>
                    <h2><?php echo $row['PRODUCT_NAME']; ?></h2>
                    <!-- <p>2 lb bag</p> -->
                    <p class="rate">€ <?php echo $row['PRICE']; ?></p>
                </div>
                <div class="btn-div">
                    <form method="POST" action="../cartpage/add_to_cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $row['PRODUCT_ID']; ?>">
                        <button type="submit" class="add-btn">ADD +</button>
                    </form>                    
                </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
    
    
</body>
<?php include ('../footer/footer.php') ?>
</html>
