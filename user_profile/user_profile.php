<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.tailwindcss.com" rel="stylesheet">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
  <!-- Include Header -->
  <?php include ('../header/header.php') ?>

  <!-- Container for both sections -->
  <div class="flex">
    <!-- Left Section with increased margin from the top -->
    <div class="w-1/4 bg-white p-4 border-r mt-9">
      <!-- Manage My Account Button with increased margin from the top -->
      <button class="w-full bg-black text-white rounded py-2 mb-4">MANAGE MY ACCOUNT</button>

      <!-- Navigation Menu with increased space between items -->
      <nav class="space-y-4">
        <!-- My Orders -->
        <div class="flex items-center my-4 mx-8">
          <a href="#" class="text-black hover:text-gray-700 flex items-center">
            <!-- SVG Icon -->
            <span class="material-symbols-outlined mx-2">
              deployed_code
            </span>
            MY ORDERS
          </a>
        </div>

        <!-- Logout Option -->
        <div class="flex items-center my-4 mx-8">
          <a href="#" class="text-black hover:text-gray-700 flex items-center">
            <!-- SVG Icon -->
            <span class="material-symbols-outlined mx-2">
              logout
            </span>
            LOGOUT
          </a>
        </div>
      </nav>
    </div>

    <!-- Right Section -->
    <div class="w-3/4 p-4">
      <div class="container mx-auto my-8 p-6 border rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-xl font-semibold">Manage My Account</h1>
        </div>
        <form>
          <div class="mb-4">
            <label for="firstName" class="block text-gray-700 text-sm font-bold mb-2">First Name:</label>
            <input type="text" id="firstName" placeholder="Enter your first name"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
          </div>
          <div class="mb-4">
            <label for="lastName" class="block text-gray-700 text-sm font-bold mb-2">Last Name:</label>
            <input type="text" id="lastName" placeholder="Enter your last name"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
          </div>
          <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
            <input type="email" id="email" value="abc@gmail.com"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
          </div>
          <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
            <input type="password" id="password" value="********"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
          </div>
          <div class="mb-4">
            <label for="dob" class="block text-gray-700 text-sm font-bold mb-2">Date of Birth:</label>
            <input type="text" id="dob" value="01/11/2023"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
          </div>
          <div class="mb-4">
            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone Number:</label>
            <input type="tel" id="phone" value="9857011098"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
          </div>
          <div class="flex justify-between">
            <button type="submit"
              class="bg-white text-black border border-gray-400 rounded py-2 px-4 hover:bg-gray-100 focus:outline-none focus:shadow-outline">Update</button>
            <button type="button"
              class="bg-white text-black border border-gray-400 rounded py-2 px-4 hover:bg-gray-100 focus:outline-none focus:shadow-outline">Change
              Password</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Include Footer -->
  <?php include ('../footer/footer.php') ?>

  <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>
