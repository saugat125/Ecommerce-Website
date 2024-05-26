<?php
include "../connect.php";
include "../notification.php";
$shopName = isset($_SESSION['shop_name']) ? $_SESSION['shop_name'] : 'Your Shop Name';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body class="bg-white">
<header class="bg-gray-100 p-4">
    <nav class="flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <span class="icons"><i class="fa fa-bars" aria-hidden="true"></i> Home &gt; Account</span>
        </div>
        <div class="user flex items-center space-x-2">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <span><?php echo $shopName; ?></span>
        </div>
    </nav>
</header>

<div class="flex min-h-screen">
    <div class="sidebar bg-white p-4">
        <?php include ('../sidebar/sidebar.php')?>
    </div>
    <!-- Right Section -->
    <div class="w-full p-4">
        <div class="container mx-auto my-8 p-6 border rounded-lg">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-xl font-semibold">My Account</h1>
            </div>
            <?php
            $user_id = $_SESSION['user_id'];
            $user_query = "SELECT * FROM USERS WHERE USER_ID = '$user_id'";
            $user_stmt = oci_parse($conn, $user_query);
            oci_execute($user_stmt);
            while ($row = oci_fetch_assoc($user_stmt)) {
            ?>
            <form action="update_trader.php" method="post">
                <div class="mb-4">
                    <label for="firstName" class="block text-gray-700 text-sm font-bold mb-2">First Name:</label>
                    <input type="text" id="firstName" placeholder="Enter your first name"
                        value="<?php echo $row['FIRST_NAME']; ?>" name="first_name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                </div>
                <div class="mb-4">
                    <label for="lastName" class="block text-gray-700 text-sm font-bold mb-2">Last Name:</label>
                    <input type="text" id="lastName" placeholder="Enter your last name"
                        value="<?php echo $row['LAST_NAME']; ?>" name="last_name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                    <input type="text" id="password" value="<?php echo $row['PASSWORD']; ?>" name="password"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone Number:</label>
                    <input type="tel" id="phone" value="<?php echo $row['PHONE_NUMBER']; ?>" name="phone"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                </div>
                <div class="flex justify-between">
                    <button type="submit" name="submit"
                        class="bg-white text-black border border-gray-400 rounded py-2 px-4 hover:bg-gray-100 focus:outline-none focus:shadow-outline">Update</button>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>

<script src="https://cdn.tailwindcss.com"></script>
</body>

</html>
