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
          <a href="../trader-dashboard/homepage.php" class="text-[15px] ml-4 text-black">Customer</a>
        </div>
        <div class="p-2.5 mt-2 flex items-center px-4 cursor-pointer">
          <i class="bi bi-house-door-fill text-black"></i>
          <a href="../trader-dashboard/homepage.php" class="text-[15px] ml-4 text-black">Trader</a>
        </div>
        <div class="p-2.5 mt-2 flex items-center px-4 cursor-pointer">
          <i class="bi bi-house-door-fill text-black"></i>
          <a href="../trader-dashboard/homepage.php" class="text-[15px] ml-4 text-black">Product</a>
        </div>
        <div class="p-2.5 mt-2 flex items-center px-4 cursor-pointer">
          <i class="bi bi-house-door-fill text-black"></i>
          <a href="../trader-dashboard/homepage.php" class="text-[15px] ml-4 text-black">Verify Traders</a>
        </div>
        <div class="p-2.5 mt-2 flex items-center px-4 cursor-pointer">
          <i class="bi bi-house-door-fill text-black"></i>
          <a href="../trader-dashboard/homepage.php" class="text-[15px] ml-4 text-black">Verify Products</a>
        </div>
      </div>




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
