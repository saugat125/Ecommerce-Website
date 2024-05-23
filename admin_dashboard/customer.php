<?php 
    include ('../connect.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Data</title>
    <link rel="stylesheet" href="customer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <nav>
            <div class="nav-icons">
                <span class="icons"><i class="fa fa-bars" aria-hidden="true">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspProducts  &nbsp >   &nbsp Product List</i></span>
                <span class="user"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
            </div>
        </nav>
    </header>

    <div class="flex-page">
        <div class="sidebar">
            <?php include ('sidebar.php')?>
        </div>
        <main>
            <h1>Customers</h1>
            <div class="search-bar">
                <input type="text" placeholder="Search">
                <select name="filter">
                    <option value="all">All</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date of Birth</th>
                            <th>Phone Number</th>
                            <th>Date Joined</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "
                                SELECT u.email, u.first_name, u.last_name, u.date_of_birth, u.phone_number, c.date_joined 
                                FROM USERS u
                                INNER JOIN CUSTOMER c ON u.user_id = c.user_id";

                            $stid = oci_parse($conn, $query);
                            oci_execute($stid);

                            while ($row = oci_fetch_assoc($stid)) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['EMAIL']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['FIRST_NAME']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['LAST_NAME']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['DATE_OF_BIRTH']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['PHONE_NUMBER']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['DATE_JOINED']) . "</td>";
                                echo "</tr>";
                            }

                            oci_free_statement($stid);
                            oci_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
