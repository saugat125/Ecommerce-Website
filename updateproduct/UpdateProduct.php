<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <div class="menu">
                <div class="menu-icon">&#9776;</div>
                <span>Products > Update Products</span>
            </div>
        </div>
        <div class="navbar-right">
            <div class="profile">
                <img src="profile-pic.jpg" alt="Profile Picture">
                <div class="dropdown">
                    <button class="dropbtn">Harefield Farm <span class="arrow">&#9660;</span></button>
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
        <?php include ('../sidebar/sidebar.html') ?>
    </div>

    <div class="main-container">
        <div<div class="content">
            <div class="inner-box">
                <h2 >Update Product</h2>
                <div class="form-container">
                    <div class="container">
                        <div class="section">
                            <div class="section">
                                <h3>Product Name</h3>
                                <div class="input-box">
                                    <input type="text" placeholder="Sample product">
                                </div>
                            </div>
                            <div class="section">
                                <h3>Description</h3>
                                <textarea class="description-box" placeholder="Description"></textarea>
                            </div>
                            <div class="section">
                                <h3>Stock</h3>
                                <div class="input-box">
                                    <input type="text" placeholder="Stock">
                                </div>
                            </div>
                            <div class="section">
                                <h3>Price</h3>
                                <div class="input-box">
                                    <input type="text" placeholder="Price">
                                </div>
                            </div>
                            <div class="section">
                                <h3>Allergy Information</h3>
                                <div class="input-box">
                                    <input type="text" placeholder="Allergy">
                                </div>
                            </div>
                            <!-- <div class="section">
                                <h3>Minimum Order</h3>
                                <div class="input-box">
                                    <input type="text" placeholder="Minumum">
                                </div>
                            </div> -->
                            <div class="section">
                                <h3>Maximum Order</h3>
                                <div class="input-box">
                                    <input type="text" placeholder="Maximum">
                                </div>
                            </div>
                            <div class="section">
                                <h3>Product Image</h3>
                                <p class ="grey-text">Upload image</p>
                                <div class="upload-box">
                                    <input type="file" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class = "update-product-button">Update Product</button>
            </div>
        </div>
    </div>
    </div>
</body>
</html>