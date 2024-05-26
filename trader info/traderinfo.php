<?php include ('../connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trader Profile</title>
    <link rel="stylesheet" href="traderinfo.css">
    <link rel="stylesheet" href="../trader_navbar/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
    $trader_id = $_SESSION['user_id'];


    $shop_query = "SELECT * FROM SHOP WHERE TRADER_ID = '$trader_id'";

    $shop_stmt = oci_parse($conn, $shop_query);
    oci_execute($shop_stmt);

    while ($row = oci_fetch_assoc($shop_stmt)) {
        ?>
    <header>
        <nav>
            <div class="nav-icons">
                <span class="icons"><i class="fa fa-bars" aria-hidden="true">Home > Shop</span>
                <span class="user"><i class="fa fa-user-circle" aria-hidden="true"></i><?php echo $row['SHOP_NAME']; ?></span>
            </div>
        </nav>
    </header>


    <div class="flex-page">

    <div class="sidebar">
        <?php include ('../sidebar/sidebar.php')?>
    </div>

    <div class="shop">

    

    <form action="update_shopinfo.php" method="post" enctype="multipart/form-data">
    <div class="profile-container">
        <div class="cover-photo">
            <input type="file" accept="image/*" id="simage" name="image" >
            <input type="hidden" name="image-alt1" value="<?php echo $row['SHOP_IMAGE']; ?>">
            <img id="cover-photo" src="../image/<?php echo $row['SHOP_IMAGE']; ?>" alt="Image Preview">
            <!-- <img src="cover-photo.jpg" alt="Cover Photo" id="cover-photo"> -->
        </div>
        <div class="profile-info">
            <div class="profile-picture">
                <input type="file" accept="image/*" id="slogo" name="logo" >
                <input type="hidden" name="image-alt" value="<?php echo $row['SHOP_LOGO']; ?>">
                <img id="profile-picture"  src="../image/<?php echo $row['SHOP_LOGO']; ?>"
                    alt="Image Preview">
                <!-- <img src="profile-picture.jpg" alt="Profile Picture" id="profile-picture"> -->
            </div>
            <h1 id="store-name" ><?php echo $row['SHOP_NAME']; ?></h1>
            <p id="description"><?php echo $row['SHOP_DESCRIPTION']; ?></p>
        </div>
    </div>
    <div class="trader-info">
        <h2>Shop Information</h2>
        <div class="form" id="trader-info-form">
            <label for="store-name-input">Shop Name:</label>
            <input type="text" id="store-name-input"  name="shop_name" value="<?php echo $row['SHOP_NAME']; ?>">
            <label for="desc-input">Description:</label>
            <input type="text" id="desc-input"  name="description" value="<?php echo $row['SHOP_DESCRIPTION']; ?>">
            <label for="address-input">Address:</label>
            <input type="text" id="address-input"  name="address" value="<?php echo $row['ADDRESS']; ?>">
            <button type="submit" name="submit">Save</button>
        </f>
    </div>
    </div>
    </form>

    <?php } ?>

    </div>
    <script src="traderinfo.js"></script>
    <script>
        document.getElementById('slogo').addEventListener('change', function() {
            const fileInput = this;
            const fileNameDisplay = document.getElementById('file-name');
            const imagePreview = document.getElementById('profile-picture');

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

    <script>
        document.getElementById('simage').addEventListener('change', function() {
            const fileInput = this;
            const fileNameDisplay = document.getElementById('file-name');
            const imagePreview = document.getElementById('cover-photo');

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
