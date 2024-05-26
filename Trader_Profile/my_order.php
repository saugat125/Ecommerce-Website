<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>

<body>

    <!-- Include Header -->
    <?php include ('../header/header.php') ?>

    <!-- User Profile Section-->
    <div class="flex mx-16 mt-8">
        <!-- Manage Account Section -->
        <div class="w-1/3 p-4">
            <h2 class="text-lg font-bold mb-4">Manage Account</h2>
            <ul class="space-y-2">
                <li><a href="#" class="text-gray-600 hover:text-red-500">Account Information</a></li>
                <li><a href="#" class="text-red-500 font-bold">My orders</a></li>
                <li><a href="#" class="text-gray-600 hover:text-red-500">Logout</a></li>
            </ul>
        </div>

        <!-- Manage My Account Section -->
        <div class="w-2/3 p-4">
            <h2 class="text-lg font-bold mb-4">Manage My Account</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="text-left p-2">Order Id</th>
                            <th class="text-left p-2">Date</th>
                            <th class="text-left p-2">Collection Slot</th>
                            <th class="text-left p-2">Order Total</th>
                            <th class="text-left p-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-2">3333</td>
                            <td class="p-2">03/11/2023</td>
                            <td class="p-2">Wed. 1pm</td>
                            <td class="p-2">$120.00</td>
                            <td class="p-2">
                                <button
                                    class="bg-blue-500 text-white px-2 py-1 text-sm rounded hover:bg-blue-600">View</button>
                                <button
                                    class="bg-red-500 text-white px-2 py-1 text-sm rounded hover:bg-red-600">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Include Footer -->
    <?php include ('../footer/footer.php') ?>

    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>