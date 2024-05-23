<?php
include ('../connect.php');
session_start();
?>

<?php

if (isset($_POST['disable'])) {
    $product_id = $_POST['product_id'];
    $is_approved = 'N';

    $disable_query = "UPDATE PRODUCT SET ISAPPROVED = '$is_approved' WHERE PRODUCT_ID = '$product_id'";

    $disable_stmt = oci_parse($conn, $disable_query);

    if (oci_execute($disable_stmt)) {
        header('location: product.php');
    }

}

?>
<?php

if (isset($_POST['enable'])) {
    $product_id = $_POST['product_id'];
    $is_approved = 'Y';

    $disable_query = "UPDATE PRODUCT SET ISAPPROVED = '$is_approved' WHERE PRODUCT_ID = '$product_id'";

    $disable_stmt = oci_parse($conn, $disable_query);

    if (oci_execute($disable_stmt)) {
        header('location: product.php');
    }

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Data</title>
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <nav>
            <div class="nav-icons">
                <span class="icons"><i class="fa fa-bars"
                        aria-hidden="true">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspADMIN &nbsp > &nbsp
                        PRODUCTS</i></span>
                <span class="user"><i class="fa fa-user-circle" aria-hidden="true"></i> ADMIN</span>
            </div>
        </nav>
    </header>

    <div class="flex-page">
        <div class="sidebar">
            <?php include ('sidebar.php') ?>
        </div>
        <main>
            <h1 style="font-size:20px;margin-bottom:20px;">Products</h1>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Stock</th>
                            <th>Price(£)</th>
                            <th>Shop Name</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $product_query = "
                            SELECT p.product_id, p.product_name, p.stock_available, p.price, p.isApproved, p.product_image,
                                s.shop_name,
                                u.first_name, u.last_name
                            FROM PRODUCT p
                            JOIN SHOP s ON p.shop_id = s.shop_id
                            JOIN TRADER t ON s.trader_id = t.user_id
                            JOIN USERS u ON t.user_id = u.user_id";

                        $product_stmt = oci_parse($conn, $product_query);
                        oci_execute($product_stmt);

                        while ($row = oci_fetch_assoc($product_stmt)) {
                            echo "<tr>";
                            echo '<td><img src="../image/' . $row['PRODUCT_IMAGE'] . '" width="80px" height="auto" alt="Image"></td>';
                            echo "<td>" . htmlspecialchars($row['PRODUCT_NAME']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['STOCK_AVAILABLE']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['PRICE']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['SHOP_NAME']) . "</td>";
                            echo "<td>" . ($row['ISAPPROVED'] === 'Y' ? 'Approved' : 'Not Approved') . "</td>";
                            echo "<form action='#' method='post'>";
                            echo "<td><button type='submit' name='disable'>Disable</button></td>";
                            echo "<td><input type='hidden' name='product_id' value='" . $row['PRODUCT_ID'] . "'></td>";
                            echo "<td><button type='submit' name='enable'>Approve</button></td>";
                            echo "</form>";
                            echo "</tr>";
                        }

                        oci_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>


</body>

</html>