<?php include ('../connect.php');
session_start();
?>

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
    <?php
    include ('../header/home_header.php');
    ?>

    <!-- Container for both sections -->
    <div class="flex">
        <!-- Left Section with increased margin from the top -->
        <div class="w-1/4 bg-white p-4 border-r mt-9">
            <!-- Manage My Account Button with increased margin from the top -->
            <button class="w-full bg-black text-white rounded py-2 mb-4">MY ACCOUNT</button>

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
                <a href="../logout/logout.php" class="text-black hover:text-gray-700 mx-8">LOGOUT</a>
            </nav>
        </div>

        <!-- Right Section -->
        <div class="w-3/4 p-4">
            <div class="container mx-auto my-8 p-6 border rounded-lg shadow-lg">
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
                    <form action="update-user.php" method="post">
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

    <!-- Include Footer -->
    <?php include ('../footer/footer.php') ?>

    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>