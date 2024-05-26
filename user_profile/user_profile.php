<?php include ('../connect.php');
include "../notification.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <link href="https://cdn.tailwindcss.com" rel="stylesheet">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
  <!-- Container for both sections -->
  <div class="flex">
    <!-- Left Section with increased margin from the top -->
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




    <!-- Right Section -->
    <div class="w-3/4 p-4 pl-10">
      <div class="container mx-auto my-0 p-6 border rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-xl font-semibold">My Account</h1>
        </div>
        <?php 
              $user_id = $_SESSION['user_id'];


              $user_query = "SELECT * FROM USERS WHERE USER_ID = '$user_id'";
          
              $user_stmt = oci_parse($conn, $user_query);
              oci_execute($user_stmt);

              while ($row = oci_fetch_assoc($user_stmt)){

              
        ?>
        <form action="update-user.php" method="post">
          <div class="mb-4">
            <label for="firstName" class="block text-gray-700 text-sm font-bold mb-2">First Name:</label>
            <input type="text" id="firstName" placeholder="Enter your first name" value="<?php echo $row['FIRST_NAME']; ?>" name = "first_name"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
          </div>
          <div class="mb-4">
            <label for="lastName" class="block text-gray-700 text-sm font-bold mb-2">Last Name:</label>
            <input type="text" id="lastName" placeholder="Enter your last name" value="<?php echo $row['LAST_NAME']; ?>" name = "last_name"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
          </div>
          <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
            <input type="text" id="password" value="<?php echo $row['PASSWORD']; ?>" name = "password"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
          </div>
          <div class="mb-4">
            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone Number:</label>
            <input type="tel" id="phone" value="<?php echo $row['PHONE_NUMBER']; ?>" name = "phone"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
          </div>
          <div class="flex justify-between">
            <button type="submit" name = "submit"
              class="bg-gray-300 text-black border border-gray-400 rounded py-2 px-4 hover:bg-green-400 duration-300 focus:outline-none focus:shadow-outline">Update</button>
          </div>
        </form>
              <?php } ?>
      </div>
    </div>
  </div>

  <!-- Include Footer -->
  <?php include ('../footer/footer.php') ?>

  <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>
