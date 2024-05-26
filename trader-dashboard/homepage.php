<?php
    include "../notification.php";
    $shopName = isset($_SESSION['shop_name']) ? $_SESSION['shop_name'] : 'Your Shop Name';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<link rel="stylesheet" href="homepage.css">
<link rel="stylesheet" href="../trader_navbar/navbar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<header>
    <nav>
        <div class="nav-icons">
        <span class="icons"><a href="homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Home > Overview</a></span>
            <span class="user"><i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo $shopName; ?></span>
        </div>
    </nav>
</header>

<div class="flex-page">
    <div class="sidebar">
        <?php include ('../sidebar/sidebar.php')?>
    </div>
    <div class="dashboard">
        <a href="../Trader_Profile/traderprofile.php" class="box">
            <i class="fa fa-user"></i>
            <h2>MY ACCOUNT</h2>
        </a>
        <a href="trader.php" class="box">
            <i class="fa fa-bolt"></i>
            <h2>ORACLE</h2>
        </a>
        <a href="../trader info/traderinfo.php" class="box">
            <i class="fa fa-store"></i>
            <h2>SHOP</h2>
        </a>
        <a href="../product-table/manage_product.php" class="box">
            <i class="fa fa-box"></i>
            <h2>PRODUCTS</h2>
        </a>
        <a href="../trader_order/trader_order.php" class="box">
            <i class="fa fa-shopping-cart"></i>
            <h2>ORDERS</h2>
        </a>
        <a href="../logout/logout.php" class="box">
            <i class="fa fa-sign-out-alt"></i>
            <h2>LOGOUT</h2>
        </a>
    </div>
</div>

</body>
</html>
