<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100 font-[Poppins]">
  <!-- Sidebar Section -->
  <div class="sidebar top-0 bottom-0 left-0 w-[200px] overflow-y-auto text-center bg-gray-200 shadow h-screen">
    <div class="text-xl">
      <div>
        <!-- Home Section -->
        <div class="p-2.5 mt-2 flex items-center px-4 cursor-pointer">
          <i class="fa fa-home text-black"></i>
          <a href="../trader-dashboard/homepage.php" class="text-[15px] ml-4 text-black">Home</a>
        </div>

        <!-- My Account Section -->
        <div class="p-2.5 mt-2 flex items-center rounded-full px-4 duration-300 cursor-pointer hover:bg-gray-200">
          <i class="fa fa-user text-black"></i>
          <a href="../Trader_Profile/traderprofile.php" class="text-[15px] ml-4 text-black">My Account</a>
        </div>

        <!-- Products Dropdown -->
        <div class="p-2.5 mt-2 flex items-center rounded-full px-4 duration-300 cursor-pointer hover:bg-gray-200" onclick="dropDown('submenu1', 'arrow1')">
          <i class="fa fa-box text-black"></i>
          <div class="flex justify-between w-full items-center">
            <span class="text-[15px] ml-4 text-black">Products</span>
            <span class="text-sm rotate-180" id="arrow1">
              <i class="fa fa-chevron-down text-black"></i>
            </span>
          </div>
        </div>
<<<<<<< HEAD
        <div class="leading-7 text-left text-sm font-light mt-2 w-4/5 mx-auto hidden" id="submenu1">
          <h1 class="cursor-pointer p-2 hover:bg-gray-200 rounded-full mt-1">
            <a href="../product-table/manage_product.php" class="text-black">Product List</a>
          </h1>
          <h1 class="cursor-pointer p-2 hover:bg-gray-200 rounded-full mt-1">
            <a href="../addproduct/AddProdcut.php" class="text-black">Add New Product</a>
          </h1>
=======
        <div class=" leading-7 text-left text-sm font-light mt-2 w-4/5 mx-auto hidden" id="submenu1">
          <h1 class="cursor-pointer p-2 hover:bg-gray-500 rounded-full mt-1"><a href="../product-table/manage_product.php">Product List</a></h1>
          <!-- <h1 class="cursor-pointer p-2 hover:bg-gray-500 rounded-full mt-1"><a href="../updateproduct/UpdateProduct.php">Update Product</a></h1> -->
          <h1 class="cursor-pointer p-2 hover:bg-gray-500 rounded-full mt-1"><a href="../addproduct/AddProdcut.php">Add New Product</a></h1>
          <h1 class="cursor-pointer p-2 hover:bg-gray-500 rounded-full mt-1"><a href="../product_category/product_category.php">Product Categories</a></h1>
>>>>>>> 70acd98f3b062d65caa85b1f93011f24566ae8a0
        </div>

        <!-- Shop Section -->
        <div class="p-2.5 mt-2 flex items-center rounded-full px-4 duration-300 cursor-pointer hover:bg-gray-200">
          <i class="fa fa-store text-black"></i>
          <a href="../trader info/traderinfo.php" class="text-[15px] ml-4 text-black">Shop</a>
        </div>

        <!-- Orders Section -->
        <div class="p-2.5 mt-2 flex items-center rounded-full px-4 duration-300 cursor-pointer hover:bg-gray-200">
          <i class="fa fa-shopping-cart text-black"></i>
          <a href="../trader_order/trader_order.php" class="text-[15px] ml-4 text-black">Order</a>
        </div>

        <!-- Logout Section -->
        <div class="p-2.5 mt-3 flex items-center rounded-full px-4 duration-300 cursor-pointer hover:bg-gray-200">
          <i class="fa fa-sign-out-alt text-black"></i>
          <a href="../logout/logout.php" class="text-[15px] ml-4 text-black hover:text-gray-700">LOGOUT</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    function dropDown(submenuId, arrowId) {
      document.getElementById(submenuId).classList.toggle('hidden');
      document.getElementById(arrowId).classList.toggle('rotate-180');
    }
  </script>
</body>

</html>
