<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="styles.css">
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
    <div class="main-container">
        <div class="sidebar">
            <?php include ('../sidebar/sidebar.html')?>
          </div>          

        <div class="content">
            <div class="inner-box">
                <h2>Add New Product</h2>
                <div class="form-container">
                    <div class="container">
                        <div class="section">
                            <h3>Product Images</h3>
                            <p class ="grey-text">Upload images</p>
                            <div class="upload-box">
                                <!-- Upload image box -->
                                <input type="file" accept="image/*">
                            </div>
                        </div>
                        <div class="section">
                            <h3>Product Information</h3>
                            <p class="grey-text">Please provide detailed information</p>
                            <div class="section">
                                <h3>Product Name</h3>
                                <div class="input-box">
                                    <input type="text" placeholder="Sample product">
                                </div>
                            </div>
                            <div class="section">
                                <h3>Product Category</h3>
                                <div class="input-box">
                                    <input type="text" placeholder="Category">
                                </div>
                            </div>
                            <div class="section">
                                <h3>Description</h3>
                                <textarea class="description-box" placeholder="Description"></textarea>
                            </div>
                            <div class="section">
                                <h3>Shop Name</h3>
                                <div class="input-box">
                                    <input type="text" placeholder="Shop Name">
                                </div>
                            </div>
                            </div>
                    </div>
                </div>
                <div class="pricing-container">
                    <div class="form-container">
                        <h2>Pricing</h2>
                        <p class="grey-text">Please provide detailed information</p>
                        <div class="container">
                            <div class="section">
                                <h3>Base Price</h3>
                                <div class="input-box">
                                    <input type="text" placeholder="Base Price">
                                </div>
                            </div>
                            <div class="section">
                                <h3>Offer Type</h3>
                                <div class="input-box">
                                    <select>
                                        <option>Choose Offer Type</option>
                                        <option>Discount</option>
                                        <option>Bundle Offer</option>
                                        <option>None</option>
                                    </select>
                                </div>
                            </div>
                            <div class="section">
                                <h3>Quantity</h3>
                                <div class="input-box">
                                    <select>
                                        <option>Please select</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="section">
                                <h3>Stock</h3>
                                <div class="input-box">
                                    <input type="text" placeholder="Stock">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class = "add-product-button">Add Product</button>
            </div>
        </div>
    </div>
</body>
</html>
