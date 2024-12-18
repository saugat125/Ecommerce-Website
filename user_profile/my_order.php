<?php
include "../notification.php";
include ('../connect.php'); // Assuming this file contains the OCI connection details

$customerId = $_SESSION['user_id'];

// Prepare and execute the SQL query to fetch orders
$query = "SELECT o.ORDER_ID, o.ORDER_DATE, o.TOTAL_PRICE, o.COLLECTION_DATE, cs.COLLECTION_DAY, cs.TIME_SLOT 
          FROM ORDERS o 
          JOIN COLLECTION_SLOT cs ON o.COLLECTION_SLOT_ID = cs.COLLECTION_SLOT_ID 
          WHERE o.CUSTOMER_ID = :customer_id";
$statement = oci_parse($conn, $query);
oci_bind_by_name($statement, ':customer_id', $customerId);
oci_execute($statement);

// Fetch data from the result set
$orders = [];
while ($row = oci_fetch_assoc($statement)) {
    $orders[] = $row;
}
?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.tailwindcss.com" rel="stylesheet">
  <link href="my_order.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>

  <!-- Include Header -->
  <?php
    if (isset($_SESSION['user_id'])) {
        include('../header/home_header.php');
    } else {
        include('../header/header.php');
    }
    ?>
  <!-- User Profile Section-->
  <div class="flex">
    <!-- Manage Account Section -->
    <div class="w-1/5 p-4 ml-0 bg-gray-200 h-full min-h-screen rounded-lg">
    <h2 class="text-2xl font-bold mb-10 mt-5 ml-4">Manage Account</h2>
    <ul class="space-y-2">
        <li class="flex items-center p-2.5 mt-2 rounded-full px-4 cursor-pointer hover:bg-gray-400 duration-300">
            <i class="bi bi-person-fill text-black mr-2"></i>
            <a href="user_profile.php" class="text-gray-600 hover:text-zinc-950 expand-link">Account Information</a>
        </li>
        <li class="flex items-center p-2.5 mt-2 rounded-full px-4 cursor-pointer hover:bg-gray-400 duration-300">
            <i class="bi bi-bag-fill text-black mr-2"></i>
            <a href="my_order.php" class="text-gray-600 hover:text-zinc-950 expand-link">My Orders</a>
        </li>
        <li class="flex items-center p-2.5 mt-2 rounded-full px-4 cursor-pointer hover:bg-gray-400 duration-300">
            <i class="bi bi-box-arrow-right text-black mr-2"></i>
            <a href="../logout/logout.php" class="text-gray-600 hover:text-zinc-950 expand-link">Logout</a>
        </li>
    </ul>
</div>

    <!-- Manage My Account Section -->
    <div class="w-2/3 p-4 pl-10 ">
      <h2 class="text-2xl font-bold mb-4 mt-5">Order History</h2>
      <div class="overflow-x-auto">
        <table class="min-w-full">
          <thead>
            <tr>
              <th class="text-left p-2">Order Id</th>
              <th class="text-left p-2">Order Date</th>
              <th class="text-left p-2">Total Price</th>
              <th class="text-left p-2">Collection Date</th>
              <th class="text-left p-2">Day</th>
              <th class="text-left p-2">Time Slot</th>
              <th class="text-left p-2">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
              <td class="p-2"><?php echo $order['ORDER_ID']; ?></td>
              <td class="p-2"><?php echo $order['ORDER_DATE']; ?></td>
              <td class="p-2"><?php echo $order['TOTAL_PRICE']; ?></td>
              <td class="p-2"><?php echo $order['COLLECTION_DATE']; ?></td>
              <td class="p-2"><?php echo $order['COLLECTION_DAY']; ?></td>
              <td class="p-2"><?php echo $order['TIME_SLOT']; ?></td>
              <td class="p-2">
                <button onclick="viewOrderDetails(<?php echo $order['ORDER_ID']; ?>)" class="bg-blue-500 text-white px-2 py-1 text-sm rounded hover:bg-blue-600">View</button>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Include Footer -->
  <?php include ('../footer/footer.php') ?>

  <script src="https://cdn.tailwindcss.com"></script>

  <script>
    function viewOrderDetails(orderId) {
      // Redirect to a PHP script passing order ID as parameter to fetch order details
      window.open("order_details.php?order_id=" + orderId, "_blank", "width=1000,height=400");
    }
  </script>
</body>

</html>
