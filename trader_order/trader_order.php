<?php
include "../notification.php";
include '../connect.php'; // Assuming this file contains the OCI connection details

// Get the shop ID from the session
if(isset($_SESSION['shop_id'])) {
    $shopId = $_SESSION['shop_id'];

    // Prepare and execute the SQL query to fetch order details
    $query = "SELECT op.ORDER_PRODUCT_ID, p.PRODUCT_NAME, p.PRODUCT_IMAGE, op.QUANTITY, p.PRICE,
                (op.QUANTITY * p.PRICE) AS TOTAL_PRICE,
                cs.COLLECTION_DAY, cs.TIME_SLOT
            FROM ORDER_PRODUCT op
            JOIN PRODUCT p ON op.PRODUCT_ID = p.PRODUCT_ID
            JOIN SHOP s ON p.SHOP_ID = s.SHOP_ID
            JOIN ORDERS o ON op.ORDER_ID = o.ORDER_ID
            JOIN COLLECTION_SLOT cs ON o.COLLECTION_SLOT_ID = cs.COLLECTION_SLOT_ID
            WHERE s.SHOP_ID = :shop_id";

    $statement = oci_parse($conn, $query);
    oci_bind_by_name($statement, ':shop_id', $shopId);
    oci_execute($statement);

    // Fetch data from the result set
    $orderProducts = [];
    while ($row = oci_fetch_assoc($statement)) {
        $orderProducts[] = $row;
    }
} else {
    // Redirect or display an error message if shop ID is not found in the session
    header("Location: ../error.php");
    exit;
}
?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.tailwindcss.com" rel="stylesheet">
  <link href="trader_order.css" rel="stylesheet">zz
  <style>
    /* Add any custom styles here */
  </style>
</head>

<body>
    <div class="flex-page">
        <div class="sidebar">
        <?php include ('../sidebar/sidebar.php')?>
        </div>
        <div class="flex flex-col items-center justify-center h-screen">
        <h2 class="text-3xl font-bold text-center mb-8">Order Details for Trader</h2>
        <div>
            <table>
            <thead>
                <tr>
                <th class="text-left p-2">Product Image</th>
                <th class="text-left p-2">Product Name</th>
                <th class="text-left p-2">Quantity</th>
                <th class="text-left p-2">Price</th>
                <th class="text-left p-2">Total Price</th>
                <th class="text-left p-2">Collection Day</th>
                <th class="text-left p-2">Time Slot</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderProducts as $orderProduct): ?>
                <tr>
                <td class="p-2"><img src="../image/<?php echo $orderProduct['PRODUCT_IMAGE']; ?>" alt="Product Image" class="h-20 w-20 object-cover"></td>
                <td class="p-2"><?php echo $orderProduct['PRODUCT_NAME']; ?></td>
                <td class="p-2"><?php echo $orderProduct['QUANTITY']; ?></td>
                <td class="p-2">$<?php echo $orderProduct['PRICE']; ?></td>
                <td class="p-2">$<?php echo $orderProduct['TOTAL_PRICE']; ?></td>
                <td class="p-2"><?php echo $orderProduct['COLLECTION_DAY']; ?></td>
                <td class="p-2"><?php echo $orderProduct['TIME_SLOT']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>


  <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>
