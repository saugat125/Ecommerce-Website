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
        $logo = $_FILES['logo']['name'];
        $logo_temp = $_FILES['logo']['tmp_name'];
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];







    if (empty($logo)) {
        $logo = $_POST['image-alt'];
        if(empty($image)){
            $image = $_POST['image-alt1'];
            $query = "UPDATE SHOP SET SHOP_NAME=:shop_name, SHOP_DESCRIPTION=:description,ADDRESS=:address WHERE SHOP_ID = '$shop_id'";
            $update_stmt = oci_parse($conn, $query);
            oci_bind_by_name($update_stmt, ':shop_name', $shop_name);
            oci_bind_by_name($update_stmt, ':description', $description);
            oci_bind_by_name($update_stmt, ':address', $address);
            if (oci_execute($update_stmt)) {
                header('location: traderinfo.php');
            } else {
                echo '<script>alert("ERROR: ' . oci_error($update_stmt) . '")</script>';
            }
        }
        else{
            $destination = "../image/" . $image;
            if (move_uploaded_file($image_temp, $destination)) {
                $query = "UPDATE SHOP SET SHOP_NAME=:shop_name, SHOP_DESCRIPTION=:description,ADDRESS=:address,SHOP_IMAGE=:image WHERE SHOP_ID = '$shop_id'";
                $update_stmt = oci_parse($conn, $query);
                oci_bind_by_name($update_stmt, ':shop_name', $shop_name);
                oci_bind_by_name($update_stmt, ':description', $description);
                oci_bind_by_name($update_stmt, ':address', $address);
                oci_bind_by_name($update_stmt, ':image', $image);
                if (oci_execute($update_stmt)) {
                    // header('location: traderinfo.php');
                    echo '<script>alert("ERROR: ' . oci_error($update_stmt) . '")</script>';
                } else {
                    echo '<script>alert("ERROR: ' . oci_error($update_stmt) . '")</script>';
                }
            }
        }
        
    } else {

        if (empty($image)) {
            $destination = "../image/" . $logo;
            $image = $_POST['image-alt1'];
            if (move_uploaded_file($logo_temp, $destination)){
                $query = "UPDATE SHOP SET SHOP_NAME=:shop_name, SHOP_DESCRIPTION=:description,ADDRESS=:address,SHOP_LOGO=:logo WHERE SHOP_ID = '$shop_id'";
                $update_stmt = oci_parse($conn, $query);
                oci_bind_by_name($update_stmt, ':shop_name', $shop_name);
                oci_bind_by_name($update_stmt, ':description', $description);
                oci_bind_by_name($update_stmt, ':address', $address);
                oci_bind_by_name($update_stmt, ':logo', $logo);
                if (oci_execute($update_stmt)) {
                    header('location: traderinfo.php');
                } else {
                    echo '<script>alert("ERROR: ' . oci_error($update_stmt) . '")</script>';
                }
            }
            
        } else {
            $destination = "../image/" . $logo;
            $destination = "../image/" . $image;
            if (move_uploaded_file($logo_temp, $destination) && move_uploaded_file($image_temp, $destination)) {
                $query = "UPDATE SHOP SET SHOP_NAME=:shop_name, SHOP_DESCRIPTION=:description,ADDRESS=:address,SHOP_LOGO=:logo,SHOP_IMAGE=:image WHERE SHOP_ID = '$shop_id'";
                $update_stmt = oci_parse($conn, $query);
                oci_bind_by_name($update_stmt, ':shop_name', $shop_name);
                oci_bind_by_name($update_stmt, ':description', $description);
                oci_bind_by_name($update_stmt, ':address', $address);
                oci_bind_by_name($update_stmt, ':logo', $logo);
                oci_bind_by_name($update_stmt, ':image', $image);
                if (oci_execute($update_stmt)) {
                    // header('location: traderinfo.php');
                    echo '<script>alert("ERROR: ' . oci_error($update_stmt) . '")</script>';
                } else {
                    echo '<script>alert("ERROR: ' . oci_error($update_stmt) . '")</script>';
                }
            } else {
                // Failed to move file
                echo '<script>alert("Failed to move uploaded file.")</script>';
            }
        }







        $destination = "../image/" . $logo;
        if (move_uploaded_file($logo_temp, $destination)) {
            $query = "UPDATE SHOP SET SHOP_NAME=:shop_name, SHOP_DESCRIPTION=:description,ADDRESS=:address,SHOP_LOGO=:logo,SHOP_IMAGE=:image WHERE SHOP_ID = '$shop_id'";
            $update_stmt = oci_parse($conn, $query);
            oci_bind_by_name($update_stmt, ':shop_name', $shop_name);
            oci_bind_by_name($update_stmt, ':description', $description);
            oci_bind_by_name($update_stmt, ':address', $address);
            oci_bind_by_name($update_stmt, ':logo', $logo);
            oci_bind_by_name($update_stmt, ':image', $image);
            if (oci_execute($update_stmt)) {
                // header('location: traderinfo.php');
                echo '<script>alert("ERROR: ' . oci_error($update_stmt) . '")</script>';
            } else {
                echo '<script>alert("ERROR: ' . oci_error($update_stmt) . '")</script>';
            }
        } else {
            // Failed to move file
            echo '<script>alert("Failed to move uploaded file.")</script>';
        }
    }




        if (oci_execute($update_stmt)) {
            header('location: traderinfo.php');
        } else {
            echo '<script>alert("ERROR: ' . oci_error($update_stmt) . '")</script>';
        }

    }

?>

