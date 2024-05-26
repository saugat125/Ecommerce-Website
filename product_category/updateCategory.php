<?php 
    include ('../connect.php'); 
    session_start();
    $shopName = isset($_SESSION['shop_name']) ? $_SESSION['shop_name'] : 'Your Shop Name';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
    <link rel="stylesheet" href="updateCategory.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <div class="menu">
                <div class="menu-icon">&#9776;</div>
                <span>Products > Update Category</span>
            </div>
        </div>
        <div class="navbar-right">
            <div class="profile">
                <img src="profile-pic.jpg" alt="Profile Picture">
                <div class="dropdown">
                    <button class="dropbtn"><?php echo $shopName; ?><span class="arrow">&#9660;</span></button>
                    <div class="dropdown-content">
                        <!-- Add your dropdown content here -->
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    

    <div class="flex-page">

    <div class="sidebar">
        <?php include ('../sidebar/sidebar.php') ?>
    </div>

    <div class="main-container">
        <div<div class="content">
            <div class="inner-box">
                <h2 >Update Category</h2>
                <div class="form-container">

                    <?php

                    $category_id = $_GET['ID'];

                    $product_query = "SELECT * FROM PRODUCT_CATEGORY WHERE CATEGORY_ID = '$category_id'";
                    $product_stmt = oci_parse($conn, $product_query);

                    oci_execute($product_stmt);

                    while ($row = oci_fetch_assoc($product_stmt)){

                    ?>

                    <form action="update_handle.php" method="post" enctype="multipart/form-data">
                        <div class="container">
                            <div class="section">
                                <input type="hidden" name="category_id" value="<?php echo $category_id; ?>" />
                                <div class="section">
                                    <h3>Category Name</h3>
                                    <div class="input-box">
                                        <input type="text" placeholder="Sample product" name="name" value="<?php echo $row['CATEGORY_NAME']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class = "update-product-button" type="submit" name="submit">Update Product</button>
                    </form>
                    <?php
                    }
                    ?>
                </div>
                
            </div>
        </div>
    </div>
    </div>
<script>
        document.getElementById('pimage').addEventListener('change', function() {
            const fileInput = this;
            const fileNameDisplay = document.getElementById('file-name');
            const imagePreview = document.getElementById('image-preview');

            const file = fileInput.files[0];
            if (file) {


                // Check if the selected file is an image
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
            } 
            else {
                fileNameDisplay.textContent = '';
                imagePreview.style.display = 'none';
            }
        });
    </script>
</body>
</html>