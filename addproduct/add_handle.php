<?php include ('../connect.php') ?>

<?php 

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $stock = $_POST['stock'];
        $price = $_POST['price'];
        $allergy = $_POST['allergy'];
        $max_order = $_POST['max_order'];
        $image = $_FILES['image']['name'];

        $query = "INSERT INTO PRODUCT (PRODUCT_NAME,DESCRIPTION,PRICE,STOCK_AVAILABLE,MAX_ORDER,ALLERGY_INFORMATION,PRODUCT_IMAGE,ISAPPROVED,SHOP_ID) VALUES('$name','$description','$price','$stock','$max_order','$allergy','$image','N',1)";

        $insert_stmt = oci_parse($conn,$query);

        if(oci_execute($insert_stmt)){
            header ('location: ../product-table/manage_product.php');
        }
        else{
            echo'<script>alert("ERROR: '.oci_error($insert_stmt).'")</script>';
        }

    }
    oci_close($conn);
?>