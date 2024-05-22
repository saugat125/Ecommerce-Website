<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sidebar</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<!-- Sidebar Section-->

<body class="bg-gray-100 font-[Poppins]">
  <div class="sidebar top-0 bottom-0 left-0 w-[200px] overflow-y-auto text-center bg-gray-200 shadow h-screen" >
    <div class="text-xl">

      <div>
        <div class="p-2.5 mt-2 flex items-center px-4 cursor-pointer">
          <i class="bi bi-house-door-fill text-black"></i>
          <a href="../trader-dashboard/homepage.php" class="text-[15px] ml-4 text-black">Home</a>
        </div>

        <!-- Dropdown 1-->
        <div class="p-2.5 mt-2 flex items-center rounded-full px-4 duration-300 cursor-pointer  hover:bg-gray-400"
          onclick="dropDown('submenu1', 'arrow1')">
          <i class="bi bi-chat-left-text-fill text-black"></i>
          <div class="flex justify-between w-full items-center">
            <span class="text-[15px] ml-4 text-black">Products</span>
            <span class="text-sm rotate-180" id="arrow1">
              <i class="bi bi-chevron-down text-black"></i>
            </span>
          </div>
        </div>
        <div class=" leading-7 text-left text-sm font-light mt-2 w-4/5 mx-auto hidden" id="submenu1">
          <h1 class="cursor-pointer p-2 hover:bg-gray-500 rounded-full mt-1"><a href="../product-table/manage_product.php">Product List</a></h1>
          <!-- <h1 class="cursor-pointer p-2 hover:bg-gray-500 rounded-full mt-1"><a href="../updateproduct/UpdateProduct.php">Update Product</a></h1> -->
          <h1 class="cursor-pointer p-2 hover:bg-gray-500 rounded-full mt-1"><a href="../addproduct/AddProdcut.php">Add New Product</a></h1>
        </div>

        <!-- Dropdown 2-->
        <div class="p-2.5 mt-2 flex items-center rounded-full px-4 duration-300 cursor-pointer  hover:bg-gray-400"
          onclick="dropDown('submenu2', 'arrow2')">
          <i class="bi bi-chat-left-text-fill text-black"></i>
          <div class="flex justify-between w-full items-center">
            <span class="text-[15px] ml-4 text-black"><a href="../trader info/traderinfo.php">Shop</a></span>
            <!-- <span class="text-sm rotate-180" id="arrow2">
              <i class="bi bi-chevron-down text-black"></i>
            </span> -->
          </div>
        </div>
        <!-- <div class=" leading-7 text-left text-sm font-light mt-2 w-4/5 mx-auto hidden" id="submenu2">
          <h1 class="cursor-pointer p-2 hover:bg-gray-500 rounded-full mt-1">Shop 1</h1>
          <h1 class="cursor-pointer p-2 hover:bg-gray-500 rounded-full mt-1">Shop 2</h1>
          <h1 class="cursor-pointer p-2 hover:bg-gray-500 rounded-full mt-1">Shop 3</h1>
        </div> -->
        <!-- Dropdown 3-->
        <div class="p-2.5 mt-2 flex items-center rounded-full px-4 duration-300 cursor-pointer  hover:bg-gray-400"
          onclick="dropDown('submenu3', 'arrow3')">
          <i class="bi bi-chat-left-text-fill text-black"></i>
          <div class="flex justify-between w-full items-center">
            <span class="text-[15px] ml-4 text-black"><a href="../">Order</a></span>
            <!-- <span class="text-sm rotate-180" id="arrow3">
              <i class="bi bi-chevron-down text-black"></i>
            </span> -->
          </div>
        </div>
        <!-- <div class=" leading-7 text-left text-sm font-light mt-2 w-4/5 mx-auto hidden" id="submenu3">
          <h1 class="cursor-pointer p-2 hover:bg-gray-500 rounded-full mt-1">Order 1</h1>
          <h1 class="cursor-pointer p-2 hover:bg-gray-500 rounded-full mt-1">Order 2</h1>
          <h1 class="cursor-pointer p-2 hover:bg-gray-500 rounded-full mt-1">Order 3</h1>
        </div> -->

        <!--Logout Section-->
        <div class="p-2.5 mt-3 flex items-center rounded-full px-4 duration-300 cursor-pointer  hover:bg-gray-400">
          <i class="bi bi-box-arrow-in-right text-black"></i>
          <span class="text-[15px] ml-4 text-black"><a href="../logout/logout.php" class="text-black hover:text-gray-700 ">LOGOUT</a></span>
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