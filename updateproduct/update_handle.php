<?php
include ('../connect.php');

if (isset($_POST['submit'])) {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $allergy = $_POST['allergy'];
    $max_order = $_POST['max_order'];
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name']; 
    if (empty($image)) {
        $image = $_POST['image-alt'];
    }

    $destination = "../image/" . $image; 
    if (empty($image) || move_uploaded_file($image_temp, $destination)) {
        $query = "UPDATE PRODUCT SET PRODUCT_NAME='$name',DESCRIPTION='$description',PRICE='$price',STOCK_AVAILABLE='$stock',MAX_ORDER='$max_order',ALLERGY_INFORMATION='$allergy',PRODUCT_IMAGE='$image' WHERE PRODUCT_ID='$product_id'";

        $update_stmt = oci_parse($conn, $query);

        if (oci_execute($update_stmt)) {
            header('location: ../product-table/manage_product.php');
        } else {
            echo '<script>alert("ERROR: ' . oci_error($update_stmt) . '")</script>';
        }
    } else {
        // Failed to move file
        echo '<script>alert("Failed to move uploaded file.")</script>';
    }
}
oci_close($conn);
?>