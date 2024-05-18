<?php include ('../connect.php') ?>

<?php

    if (isset($_POST['submit'])) {
        $product_id = $_POST['product_id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $stock = $_POST['stock'];
        $price = $_POST['price'];
        $allergy = $_POST['allergy'];
        $max_order = $_POST['max_order'];
        $image = $_FILES['image']['name'];
        if (empty($image)) {
            $image = $_POST['image-alt'];
        }

        $query = "UPDATE PRODUCT SET PRODUCT_NAME='$name',DESCRIPTION='$description',PRICE='$price',STOCK_AVAILABLE='$stock',MAX_ORDER='$max_order',ALLERGY_INFORMATION='$allergy',PRODUCT_IMAGE='$image' WHERE PRODUCT_ID='$product_id'";

        $update_stmt = oci_parse($conn, $query);

        if (oci_execute($update_stmt)) {
            header('location: ../product-table/manage_product.php');
        } else {
            echo '<script>alert("ERROR: ' . oci_error($update_stmt) . '")</script>';
        }

    }
    oci_close($conn);

?>