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
                <span class="icons"><i class="fa fa-bars" aria-hidden="true">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspADMIN  &nbsp >   &nbsp CUSTOMERS</i></span>
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
                <h2>CUSTOMERS</h2>
                <p>Content for box 1</p>
            </a>
            <a href="trader.php" class="box">
                <h2>TRADERS</h2>
                <p>Content for box 2</p>
            </a>
            <a href="product.php" class="box">
                <h2>PRODUCTS</h2>
                <p>Content for box 3</p>
            </a>
            <a href="oracle.php" class="box">
                <h2>ORACLE</h2>
                <p>Content for box 4</p>
            </a>
        </div>
    </div>
</body>
</html>
