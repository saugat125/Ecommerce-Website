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

    <div class="search-results">
        <h2><i>Search Results:</i></h2>
    </div>

    <div class="products">
        <div class="container">

            <div class="card">
                <a href="../product_detail/product_detail.php?ID=PRODUCT_ID">
                    <div class="img-div">
                        <img src="../image/PRODUCT_IMAGE" alt="alt text">
                    </div>
                    <div>
                        <h2>Apple</h2>
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
