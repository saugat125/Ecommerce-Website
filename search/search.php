<?php include ('../connect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="search.css">
</head>

<body>
    <?php include ('../header/header.php'); ?>

    <section class="productheading">
        <div class="product-heading">
            <h2>Products</h2>
        </div>
    </section>

    <div class="products">
        <div class="container">

                <div class="card">
                    <a href="../product_detail/product_detail.php?ID=<?php echo $row['PRODUCT_ID']; ?>">
                    <div class="img-div">
                        <img src="../image/" alt="alt text">
                    </div>
                    <div>
                        <!-- Product Name -->
                        <h2>Apple</h2>
                        <!-- Product Name -->
                        <p>This is a very good apple</p> 
                        <p class="rate" style="font-weight:400;">100</p>
                    </div>
                    <div class="btn-div">
                        <a href="" class="add-btn">ADD +</a>
                    </div>
                    </a>
                </div>

        </div>
    </div>

    <?php include ('../footer/footer.php'); ?>
</body>

</html>