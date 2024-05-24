<?php 
    include ('../connect.php');
    session_start();
?>

<?php

if (isset($_POST['disable'])) {
    $user_id = $_POST['user_id'];
    $is_verified = 'N';

    $disable_query = "UPDATE CUSTOMER SET ISVERIFIED = '$is_verified' WHERE user_id = '$user_id'";

    $disable_stmt = oci_parse($conn, $disable_query);

    if (oci_execute($disable_stmt)) {
        header('location: customer.php');
    }

}

?>
<?php

if (isset($_POST['enable'])) {
    $user_id = $_POST['user_id'];
    $is_verified = 'Y';

    $enable_query = "UPDATE CUSTOMER SET ISVERIFIED = '$is_verified' WHERE user_id = '$user_id'";

    $enable_stmt = oci_parse($conn, $enable_query);

    if (oci_execute($enable_stmt)) {
        header('location: customer.php');
    }

}

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
                <span class="icons"><i class="fa fa-bars" aria-hidden="true">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspADMIN  &nbsp >   &nbsp CUSTOMERS</i></span>
                <span class="user"><i class="fa fa-user-circle" aria-hidden="true"></i> ADMIN</span>
            </div>
        </nav>
    </header>

    <div class="flex-page">
        <div class="sidebar">
            <?php include ('sidebar.php')?>
        </div>
        <main>
            <h1 style="font-size:20px;margin-bottom:20px;">Customers</h1>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone Number</th>
                            <th>Date Joined</th>
                            <th>Verified</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "
                                SELECT u.email, u.first_name, u.last_name, u.phone_number, c.date_joined, c.isverified,c.user_id
                                FROM USERS u
                                INNER JOIN CUSTOMER c ON u.user_id = c.user_id";

                            $stid = oci_parse($conn, $query);
                            oci_execute($stid);

                            while ($row = oci_fetch_assoc($stid)) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['EMAIL']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['FIRST_NAME']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['LAST_NAME']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['PHONE_NUMBER']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['DATE_JOINED']) . "</td>";
                                echo "<td>" . ($row['ISVERIFIED'] === 'Y' ? 'Yes' : 'No') . "</td>";
                                echo "<form action='#' method='post'>";
                                echo "<td>" . "<button type='submit' name='disable'>Disable</button>" . "</td>";
                                echo "<td>" . '<input type="hidden" name="user_id" value="'. $row['USER_ID'].'">' . "</td>";
                                echo "<td>" . "<button type='submit' name='enable'>Enable</button>" . "</td>";
                                echo "</form>";
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


