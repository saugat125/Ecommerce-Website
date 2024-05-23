<?php 
    include ('../connect.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <div class="nav-icons">
                <span class="icons"><i class="fa fa-bars" aria-hidden="true">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspProducts  &nbsp >   &nbsp Product List</i></span>
                <span class="user"><i class="fa fa-user-circle" aria-hidden="true"> <?php echo $shopName; ?></i></span>
            </div>
        </nav>
    </header>
</body>
</html>