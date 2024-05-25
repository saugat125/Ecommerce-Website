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
</head>
<link rel="stylesheet" href="homepage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<body>

  <header>
    <nav>
        <div class="nav-icons">
            <span class="icons"><i class="fa fa-bars" aria-hidden="true">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspHome  &nbsp >   &nbsp Overview</i></span>
            <span class="user"><i class="fa fa-user-circle" aria-hidden="true"> <?php echo $shopName; ?></i></span>
        </div>
    </nav>
  </header>

<div class="flex-page">

<div class="sidebar">
  <?php include ('../sidebar/sidebar.php')?>
</div>

<div class="dashboard">
            <a href="../Trader_Profile/traderprofile.php" class="box">
                <h2>MY ACCOUNT</h2>
                <p>Content for box 1</p>
            </a>
            <a href="trader.php" class="box">
                <h2>ORACLE</h2>
                <p>Content for box 2</p>
            </a>
            <a href="../trader info/traderinfo.php" class="box">
                <h2>SHOP</h2>
                <p>Content for box 3</p>
            </a>
            <a href="../product-table/manage_product.php" class="box">
                <h2>PRODUCTS</h2>
                <p>Content for box 4</p>
            </a>
            <a href="../trader_order/trader_order.php" class="box">
                <h2>ORDERS</h2>
                <p>Content for box 4</p>
            </a>
            <a href="../logout/logout.php" class="box">
                <h2>LOGOUT</h2>
                <p>Content for box 4</p>
            </a>
        </div>
</div>
</div>

</body>



</html>
