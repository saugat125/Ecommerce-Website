<<<<<<< HEAD

<?php
=======
<?php 
>>>>>>> 739ef4fa8451f3f77287a483014cc48ccb77a580
include ('../connect.php');
session_start(); 
?>
<<<<<<< HEAD

=======
>>>>>>> 739ef4fa8451f3f77287a483014cc48ccb77a580

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="allproducts.css">
</head>

<body>
<?php
    if (isset($_SESSION['user_id'])) {
        include('../header/home_header.php');
    } else {
        include('../header/header.php');
    }
<<<<<<< HEAD
?>

=======
    ?>
>>>>>>> 739ef4fa8451f3f77287a483014cc48ccb77a580

    <section class="productheading">
        <div class="product-heading">
            <h2>Products</h2>
        </div>
    </section>

    <div class="products">
        <div class="container">
            <?php 
                
                $query = "SELECT * FROM PRODUCT WHERE ISAPPROVED = 'Y'";

                $result = oci_parse($conn, $query);
                oci_execute($result);

                while ($row = oci_fetch_assoc($result)){
                ?>   

                <div class="card">
                    <a href="../product_detail/product_detail.php?ID=<?php echo $row['PRODUCT_ID']; ?>">
                    <div class="img-div">
                        <img src="../image/<?php echo $row['PRODUCT_IMAGE']; ?>" alt="<?php echo $row['PRODUCT_NAME']; ?>">
                    </div>
                    <div>
                        <h2><?php echo $row['PRODUCT_NAME']; ?></h2>
                        <!-- <p><?php echo $row['DESCRIPTION']; ?></p> -->
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

            <?php } ?>
        </div>
    </div>

    <?php include ('../footer/footer.php'); ?>
</body>

</html>