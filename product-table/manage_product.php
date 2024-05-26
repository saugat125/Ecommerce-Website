<?php 
    include ('../connect.php');
    include "../notification.php";
    $shopName = isset($_SESSION['shop_name']) ? $_SESSION['shop_name'] : 'Your Shop Name';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Listing</title>
    <link rel="stylesheet" href="manage_product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

    <div class="flex-page">

    <div class="sidebar">
        <?php include ('../sidebar/sidebar.php')?>
    </div>
    <main>
        <h1>Products</h1>
        <div class="search-bar">
            <input type="text" placeholder="Search">
            <select name="filter">
                <option value="all">All</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>PRODUCT IMAGE</th>
                        <th>PRODUCT NAME</th>
                        <th>STOCK</th>
                        <th>PRICE(£)</th>
                        <th>MAX ORDER</th>
                        <th>DISCOUNT (%)</th>
                        <th>CATEGORY</th>
                        <th>STATUS</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        $trader_id = $_SESSION['user_id'];

                        $shop_id_query = "SELECT SHOP_ID FROM SHOP WHERE TRADER_ID = '$trader_id'";

                        $product_query = "SELECT P.*, PC.CATEGORY_NAME FROM PRODUCT P LEFT JOIN PRODUCT_CATEGORY PC ON P.CATEGORY_ID = PC.CATEGORY_ID
                        WHERE P.SHOP_ID = :shop_id";

                        $shop_id_stmt = oci_parse($conn, $shop_id_query);

                        oci_execute($shop_id_stmt);

                        while($row = oci_fetch_assoc($shop_id_stmt)){
                            $shop_id = $row['SHOP_ID'];
                        }

                        $product_stmt = oci_parse($conn,$product_query);

                        oci_bind_by_name($product_stmt,':shop_id',$shop_id);

                        oci_execute($product_stmt);

                        while ($row = oci_fetch_assoc($product_stmt)) {

                            echo "<tr>";
                            echo '<td><img src="../image/' . $row['PRODUCT_IMAGE'] . '" width="80px" height="auto" alt="Image"></td>';
                            echo "<td>" . $row['PRODUCT_NAME'] . "</td>";
                            echo "<td>" . $row['STOCK_AVAILABLE'] . "</td>";
                            echo "<td>" . $row['PRICE'] . "</td>";            
                            echo "<td>" . $row['MAX_ORDER'] . "</td>";
                            echo "<td>" . $row['DISCOUNT'] . "</td>";
                            echo "<td>" . $row['CATEGORY_NAME'] . "</td>";
                            echo "<td>" . ($row['ISAPPROVED'] == 'Y' ? "Approved" : "Not Approved") . "</td>";
                            echo '    <td><button class="delete-btn"><a href="../deleteproduct/deleteProduct.php?ID=' . $row['PRODUCT_ID'] . '">Delete</a></button></td>';
                            echo '    <td><button class="update-btn"><a href="../updateproduct/UpdateProduct.php?ID=' . $row['PRODUCT_ID'] . '">Edit</a></button></td>';
                            echo "</tr>";
                        }

                        oci_close($conn);
                    ?>

                </tbody>
            </table>
        </div>
        <div class="add-btn">
            <button class="add-product"><a href="../addproduct/AddProdcut.php">ADD PRODUCT</a></button>
        </div>
        
    </main>
    </div>
</body>
</html>
