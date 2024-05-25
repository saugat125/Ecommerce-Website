<?php
include "../notification.php";
include '../connect.php'; // Assuming this file contains the OCI connection details

// Get the order ID from the URL parameter
if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];

    // Prepare and execute the SQL query to fetch order details
    $query = "SELECT op.ORDER_PRODUCT_ID, p.PRODUCT_NAME, p.PRODUCT_IMAGE, op.QUANTITY, p.PRICE, s.SHOP_NAME
              FROM ORDER_PRODUCT op
              JOIN PRODUCT p ON op.PRODUCT_ID = p.PRODUCT_ID
              JOIN SHOP s ON p.SHOP_ID = s.SHOP_ID
              WHERE op.ORDER_ID = :order_id";
    $statement = oci_parse($conn, $query);
    oci_bind_by_name($statement, ':order_id', $orderId);
    oci_execute($statement);

    // Fetch data from the result set
    $orderProducts = [];
    while ($row = oci_fetch_assoc($statement)) {
        $orderProducts[] = $row;
    }
} else {
    // Redirect or display an error message if order ID is not provided
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
  <link href="order_details.css" rel="stylesheet">
  <style>
    /* Add any custom styles here */
  </style>
</head>

<body>
  <div class="flex flex-col items-center justify-center h-screen">
    <h2 class="text-lg font-bold mb-4">Order Details</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full">
        <thead>
          <tr>
            <th class="text-left p-2">Product Image</th>
            <th class="text-left p-2">Product Name</th>
            <th class="text-left p-2">Price</th>
            <th class="text-left p-2">Quantity</th>
            <th class="text-left p-2">Total Price</th>
            <th class="text-left p-2">Shop Name</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($orderProducts as $orderProduct): ?>
          <tr>
            <td class="p-2"><img src="../image/<?php echo $orderProduct['PRODUCT_IMAGE']; ?>" alt="Product Image" class="h-20 w-20 object-cover"></td>
            <td class="p-2"><?php echo $orderProduct['PRODUCT_NAME']; ?></td>
            <td class="p-2">$<?php echo $orderProduct['PRICE']; ?></td>
            <td class="p-2"><?php echo $orderProduct['QUANTITY']; ?></td>
            <td class="p-2">$<?php echo $orderProduct['QUANTITY'] * $orderProduct['PRICE']; ?></td>
            <td class="p-2"><?php echo $orderProduct['SHOP_NAME']; ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>
