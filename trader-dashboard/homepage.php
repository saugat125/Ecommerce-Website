<?php
    session_start();
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
<div class="dashboard-header">
  <h1>Greetings,  <?php echo $shopName; ?></h1>
  <button><a href="../addproduct/AddProdcut.php">Add Product +</a></button>
</div>

<div class="dashboard-stats">
  <div class="stat-item">
    <h2>300</h2>
    <p>New orders today</p>
  </div>
  
  <div class="stat-item">
    <h2>275</h2>
    <p>Total Products</p>
  </div>

  <div class="stat-item">
    <h2>£30,000</h2>
    <p>Total Earnings</p>
  </div>

  <div class="stat-item">
    <h2>3</h2>
    <p>New Orders Today</p>
  </div>
</div>
</div>
</div>

</body>



</html>
