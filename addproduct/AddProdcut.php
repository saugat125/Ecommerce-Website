<?php 
    include ('../connect.php');
    session_start();
    $shopName = isset($_SESSION['shop_name']) ? $_SESSION['shop_name'] : 'Your Shop Name';
    $shopId = isset($_SESSION['shop_id']) ? $_SESSION['shop_id'] : null;

    $categories = [];
    if ($shopId) {
        $category_query = "SELECT CATEGORY_ID, CATEGORY_NAME FROM PRODUCT_CATEGORY WHERE SHOP_ID = :shop_id";
        $category_stmt = oci_parse($conn, $category_query);
        oci_bind_by_name($category_stmt, ':shop_id', $shopId);
        oci_execute($category_stmt);

        while ($row = oci_fetch_assoc($category_stmt)) {
            $categories[] = $row;
        }
        oci_free_statement($category_stmt);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="styles.css">z
</head>
<body>

    <nav class="navbar">
        <div class="navbar-left">
            <div class="menu">
                <div class="menu-icon">&#9776;</div>
                <span>Products > Add New Products</span>
            </div>
        </div>
        <div class="navbar-right">
            <div class="profile">
                <img src="profile-pic.jpg" alt="PP">
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
        
    <div class="main-container">
        <div class="sidebar">
            <?php include ('../sidebar/sidebar.php')?>
        </div>          

        <div class="content">
            <div class="inner-box">
                <h2>Add New Product</h2>
                <div class="form-container">
                    <form action="add_handle.php" method="post" enctype="multipart/form-data">
                        <div class="container">
                            <div class="section">
                                <div class="section">
                                    <h3>Product Name</h3>
                                    <div class="input-box">
                                        <input type="text" placeholder="Sample product" name="name" required>
                                    </div>
                                </div>
                                <div class="section">
                                    <h3>Description</h3>
                                    <textarea class="description-box" placeholder="Description" name="description" required></textarea>
                                </div>
                                <div class="section">
                                    <h3>Stock</h3>
                                    <div class="input-box">
                                        <input type="text" placeholder="Stock" name="stock" required>
                                    </div>
                                </div>
                                <div class="section">
                                    <h3>Price</h3>
                                    <div class="input-box">
                                        <input type="text" placeholder="Price" name="price" required>
                                    </div>
                                </div>
                                <div class="section">
                                    <h3>Allergy Information</h3>
                                    <div class="input-box">
                                        <input type="text" placeholder="Allergy" name="allergy" required>
                                    </div>
                                </div>
                                <div class="section">
                                    <h3>Maximum Order</h3>
                                    <div class="input-box">
                                        <input type="text" placeholder="Maximum" name="max_order" required>
                                    </div>
                                </div>
                                <div class="section">
                                    <h3>Discount (%)</h3>
                                    <div class="input-box">
                                        <input type="text" placeholder="Discount" name="discount">
                                    </div>
                                </div>
                                <div class="section">
                                    <h3>Category</h3>
                                    <div class="input-box">
                                        <select name="category" required>
                                            <option value="">Select Category</option>
                                            <?php
                                            foreach ($categories as $category) {
                                                echo '<option value="' . htmlspecialchars($category['CATEGORY_ID']) . '">' . htmlspecialchars($category['CATEGORY_NAME']) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="section">
                                    <h3>Product Image</h3>
                                    <p class="grey-text">Upload image</p>
                                    <div class="upload-box">
                                        <input type="file" accept="image/*" name="image" id="pimage" required>
                                    </div>
                                    <img id="image-preview" width="160px" height="160px" src="#" alt="Image Preview" style="display: none;">
                                </div>
                            </div>
                        </div>
                    
                    <button type="submit" name="submit" class="add-product-button">Add Product</button>
                </form>
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
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                fileNameDisplay.textContent = '';
                imagePreview.style.display = 'none';
            }
        });
    </script>
</body>
</html>
