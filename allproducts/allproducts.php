<?php include ('../connect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="allproducts.css">
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
            <?php 
                
                $query = "SELECT * FROM PRODUCT";

                $result = oci_parse($conn, $query);
                oci_execute($result);

                while ($row = oci_fetch_assoc($result)){
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
                        <a href="" class="add-btn">ADD +</a>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>

    <?php include ('../footer/footer.php'); ?>
</body>

</html>