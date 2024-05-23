<?php
include ('../connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="search.css">
</head>

<body>
<?php
    if (isset($_SESSION['user_id'])) {
        include('../header/home_header.php');
    } else {
        include('../header/header.php');
    }
    ?>
    <div class="search-results">
        <h2><i>Search Results:</i></h2>
    </div>

    <div class="products">
        <div class="container">

            <?php 
                $search_text = $_POST['search_text'];
                $search_query = "SELECT * FROM PRODUCT WHERE UPPER(PRODUCT_NAME) LIKE UPPER('%$search_text%')";

                $search_stmt = oci_parse($conn, $search_query);
                oci_execute($search_stmt);

                while ($search_row = oci_fetch_assoc($search_stmt)){

            ?>
            <div class="card">
                <a href="../product_detail/product_detail.php?ID=<?php echo $search_row['PRODUCT_ID']; ?>">
                    <div class="img-div">
                        <img src="../image/<?php echo $search_row['PRODUCT_IMAGE']; ?>" alt="<?php echo $search_row['PRODUCT_NAME']; ?>">
                    </div>
                    <div>
                        <h2><?php echo $search_row['PRODUCT_NAME']; ?></h2>
                        <!-- <p>This is a very good apple</p> -->
                        <p class="rate" style="font-weight:400;">£ <?php echo $search_row['PRICE']; ?></p>
                    </div>
                    
                    <div class="btn-div">
                        <form method="POST" action="../cartpage/add_to_cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $search_row['PRODUCT_ID']; ?>">
                            <button type="submit" class="add-btn">ADD +</button>
                        </form>
                    </div>
                </a>
            </div>
            <?php } ?>

        </div>
    </div>

    <?php include ('../footer/footer.php'); ?>
</body>

</html>
