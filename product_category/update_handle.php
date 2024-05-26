<?php
include ('../connect.php');

if (isset($_POST['submit'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];

    $query = "UPDATE PRODUCT_CATEGORY SET CATEGORY_NAME='$name' WHERE category_id='$category_id'";
    $update_stmt = oci_parse($conn, $query);
    if (oci_execute($update_stmt)) {
        header('location: product_category.php');
    } else {
        echo '<script>alert("ERROR: ' . oci_error($update_stmt) . '")</script>';
    }
    }
oci_close($conn);
?>