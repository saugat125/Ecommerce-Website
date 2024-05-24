<?php
include ('../connect.php');
session_start();

$wishlist_id = $_SESSION['wishlist_id'];

$query = "SELECT wp.WISHLIST_PRODUCT_ID, p.PRODUCT_ID, p.PRODUCT_NAME, p.PRICE, p.PRODUCT_IMAGE, p.STOCK_AVAILABLE
          FROM WISHLIST_PRODUCT wp
          JOIN PRODUCT p ON wp.PRODUCT_ID = p.PRODUCT_ID
          WHERE wp.WISHLIST_ID = :wishlist_id";

$stmt = oci_parse($conn, $query);
oci_bind_by_name($stmt, ':wishlist_id', $wishlist_id);
oci_execute($stmt);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <link rel="stylesheet" href="wishlist.css">
    <!-- Include FontAwesome CDN for the heart icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <div class="wishlist-header">
       <i class="fa fa-heart heart-icon"></i> <!-- Heart icon at the header -->
        <h1>My Wishlist</h1>
        <div class="breadcrumbs">
            <a href="../home/index.php"><i class="fas fa-home"></i> Home</a> 
            
        </div>
    </div>

    <div class="wishlist-container">
        <div class="product-list">
            <?php while ($row = oci_fetch_assoc($stmt)) { ?>
                <div class="product-item">
                    <a href="../product_detail/product_detail.php?ID=<?php echo $row['PRODUCT_ID']; ?>">
                        <img src="../image/<?php echo $row['PRODUCT_IMAGE']; ?>" alt="<?php echo $row['PRODUCT_NAME']; ?>">
                        <div class="product-details">
                            <h2><?php echo $row['PRODUCT_NAME']; ?></h2>
                    </a>
                    <p class="price">€<?php echo $row['PRICE']; ?></p>
                    <p class="stock-status"><?php echo ($row['STOCK_AVAILABLE'] > 0) ? 'In Stock' : 'Out of Stock'; ?></p>
                </div>
                <div class="btn-div">
                    <form method="POST" action="../cartpage/add_to_cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $row['PRODUCT_ID']; ?>">
                        <button type="submit" class="add-btn">ADD +</button>
                    </form>
                </div>
                <a href="delete_from_wishlist.php?product_id=<?php echo $row['PRODUCT_ID']; ?>"
                    class="add-to-cart">DELETE</a>
            </div>
        <?php } ?>
        <?php oci_free_statement($stmt); ?>
        <?php oci_close($conn); ?>
    </div>
    </div>
</body>

</html>