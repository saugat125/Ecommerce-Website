<?php
    $name = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : 'Customer';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <!-- Global -->
   <link rel="stylesheet" href="../global.css">
   <!-- Header and Footer -->
   <link rel="stylesheet" href="../header/header.css">
   <link rel="stylesheet" href="../footer/footer.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
</head>
<body>
   <header>
       <div class="header-container">
           <div class="logo">
               <a href="../index.php">
                   <img src="../image/logo.png" alt="Logo">
               </a>
           </div>
           <div class="search-bar">
               <input type="text" placeholder="Search for products, and more">
               <div class="search"><button><i class="fa-solid fa-magnifying-glass"></i></button></div>
           </div>
           <nav>
               <ul>
                   <li><a><a href="../user_profile/user_profile.php"><i class="fa fa-user" aria-hidden="true"></i><?php echo $name; ?></a></li>
                   <li><a href="../cartpage/Cart.php"><i class="fa fa-shopping-cart"></i>Cart</a></li>
                   <li><a href="../wishlist/wishlist.php"><i class="fa-regular fa-heart"></i>Wishlist</a></li>
                   <li><a href="../logout/logout.php"><button class="login-btn">Logout</button></a></li>
               </ul>
           </nav>
       </div>
       <div class="menu">
           <ul>
               <li><a href="../home/index.php">Home</a></li>
               <li><a href="../allproducts/allproducts.php">Products</a></li>
               <li><a href="../aboutus/aboutus.php">About us</a></li>
               <li><a href="../contact/contactus.php">Contact us</a></li>
           </ul>
       </div>
   </header>
   <script src="header.js"></script>
</body>
</html>