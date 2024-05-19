<?php
    include ('../connect.php');
    session_start();
?>

<?php

    if(isset($_POST['submit'])){

        $shop_id = $_SESSION['shop_id'];

        $shop_name = $_POST['shop_name'];
        $description = $_POST['description'];
        $address = $_POST['address'];

        $query = "UPDATE SHOP SET SHOP_NAME=:shop_name, SHOP_DESCRIPTION=:description,ADDRESS=:address WHERE SHOP_ID = '$shop_id'";

        $update_stmt = oci_parse($conn, $query);

        oci_bind_by_name($update_stmt,':shop_name',$shop_name);
        oci_bind_by_name($update_stmt,':description',$description);
        oci_bind_by_name($update_stmt,':address',$address);

        if (oci_execute($update_stmt)) {
            header('location: traderinfo.php');
        } else {
            echo '<script>alert("ERROR: ' . oci_error($update_stmt) . '")</script>';
        }

    }

?>

