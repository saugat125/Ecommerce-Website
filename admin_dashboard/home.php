<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <nav>
            <div class="nav-icons">
                <span class="icons"><i class="fa fa-bars" aria-hidden="true">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspADMIN  &nbsp >   &nbsp HOME</i></span>
                <span class="user"><i class="fa fa-user-circle" aria-hidden="true"></i> ADMIN</span>
            </div>
        </nav>
    </header>
    <div class="flex">
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>

        <div class="dashboard">
            <a href="customer.php" class="box">
                <i class="fas fa-users"></i>
                <h2>CUSTOMERS</h2>
            </a>
            <a href="trader.php" class="box">
                <i class="fas fa-handshake"></i>
                <h2>TRADERS</h2>
            </a>
            <a href="product.php" class="box">
                <i class="fas fa-shopping-cart"></i>
                <h2>PRODUCTS</h2>
            </a>
            <a href="oracle.php" class="box">
                <i class="fas fa-database"></i>
                <h2>ORACLE</h2>
            </a>
        </div>
    </div>
</body>
</html>
