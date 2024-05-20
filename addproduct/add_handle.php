<?php
session_start();
include ('../connect.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $allergy = $_POST['allergy'];
    $max_order = $_POST['max_order'];
    $discount = $_POST['discount'];
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name']; 

    $trader_id = $_SESSION['user_id'];

    // Query to get the shop_id
    $shop_id_query = "SELECT shop_id FROM shop WHERE trader_id = :trader_id";

    // Prepare the statement
    $shop_id_stmt = oci_parse($conn, $shop_id_query);

    // Bind the trader_id parameter
    oci_bind_by_name($shop_id_stmt, ':trader_id', $trader_id);

    // Execute the statement
    oci_execute($shop_id_stmt);

    // Fetch the result
    $shop_id = null;
    if ($row = oci_fetch_assoc($shop_id_stmt)) {
        $shop_id = $row['SHOP_ID'];
    }

    // Close the statement
    oci_free_statement($shop_id_stmt);

    $destination = "../image/" . $image; 
    if (move_uploaded_file($image_temp, $destination)) {
        $query = "INSERT INTO PRODUCT (PRODUCT_NAME,DESCRIPTION,PRICE,STOCK_AVAILABLE,MAX_ORDER,ALLERGY_INFORMATION,DISCOUNT,PRODUCT_IMAGE,ISAPPROVED,SHOP_ID) VALUES('$name','$description','$price','$stock','$max_order','$allergy','$discount','$image','N','$shop_id')";

        $insert_stmt = oci_parse($conn, $query);

        if (oci_execute($insert_stmt)) {
            header('location: ../product-table/manage_product.php');
        } else {
            echo '<script>alert("ERROR: ' . oci_error($insert_stmt) . '")</script>';
        }
    } else {
        // Failed to move file
        echo '<script>alert("Failed to move uploaded file.")</script>';
    }
}
oci_close($conn);
?>