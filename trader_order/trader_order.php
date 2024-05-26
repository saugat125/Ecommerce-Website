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
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="bg-white">
  <div class="flex min-h-screen">
    <div class="w-64 bg-white">
      <?php include ('../sidebar/sidebar.php')?>
    </div>
    <div class="flex-grow p-4">
      <h2 class="text-3xl font-bold text-black mb-6">Order Details for Trader</h2>
      <div class="overflow-x-auto">
        <table class="min-w-full bg-black text-white">
          <thead>
            <tr>
              <th class="py-3 px-4 text-left">Product Image</th>
              <th class="py-3 px-4 text-left">Product Name</th>
              <th class="py-3 px-4 text-left">Quantity</th>
              <th class="py-3 px-4 text-left">Price</th>
              <th class="py-3 px-4 text-left">Total Price</th>
              <th class="py-3 px-4 text-left">Collection Day</th>
              <th class="py-3 px-4 text-left">Time Slot</th>
            </tr>
          </thead>
          <tbody class="bg-gray-700">
            <?php foreach ($orderProducts as $orderProduct): ?>
            <tr class="bg-gray-800 border-b border-gray-600">
              <td class="py-3 px-4"><img src="../image/<?php echo $orderProduct['PRODUCT_IMAGE']; ?>" alt="Product Image" class="h-20 w-20 object-cover"></td>
              <td class="py-3 px-4"><?php echo $orderProduct['PRODUCT_NAME']; ?></td>
              <td class="py-3 px-4"><?php echo $orderProduct['QUANTITY']; ?></td>
              <td class="py-3 px-4">$<?php echo $orderProduct['PRICE']; ?></td>
              <td class="py-3 px-4">$<?php echo $orderProduct['TOTAL_PRICE']; ?></td>
              <td class="py-3 px-4"><?php echo $orderProduct['COLLECTION_DAY']; ?></td>
              <td class="py-3 px-4"><?php echo $orderProduct['TIME_SLOT']; ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>
