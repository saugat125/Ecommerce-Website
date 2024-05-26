<?php 
include ('../connect.php') ;
include "../notification.php";
?>

<?php

    $category_id = $_GET['ID'];

    $delete_query = "DELETE FROM PRODUCT_CATEGORY WHERE CATEGORY_ID = '$category_id'";

    $delete_stmt = oci_parse($conn, $delete_query);

    oci_execute($delete_stmt);

    if(oci_num_rows($delete_stmt) > 0) {
        header('location: product_category.php');
    } 
    else {
        echo '<script>alert("ERROR: ' . oci_error($delete_stmt) . '")</script>';
    }

    oci_close($conn);

?>