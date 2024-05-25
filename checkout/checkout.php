<?php
include('../connect.php');
include('../notification.php');

// Assume the cart_id is stored in the session
$cart_id = $_SESSION['cart_id'];

function getValidDays() {
    $validDays = [];
    $now = new DateTime();
    $now->setTime(0, 0, 0);

    // Loop to find the next valid Wed, Thu, Fri
    for ($i = 1; $i <= 14; $i++) {
        $day = clone $now;
        $day->modify("+$i days");
        $dayName = $day->format('D');

        if (in_array($dayName, ['Wed', 'Thu', 'Fri'])) {
            $validDays[] = $day;
        }
    }

    return $validDays;
}

function generateDayOptions() {
    $validDays = getValidDays();
    $options = '';
    $now = new DateTime();

    foreach ($validDays as $day) {
        $interval = $now->diff($day);
        if ($interval->d > 0 || ($interval->d == 1 && $now->format('H') < 16)) {
            $formattedDay = $day->format('Y-m-d');
            $dayName = $day->format('l, F j, Y');
            $options .= "<option value=\"$formattedDay\">$dayName</option>";
        }
    }

    return $options;
}

function generateTimeOptions($selectedDay = null) {
    $timeSlots = ['10-13', '13-16', '16-19'];
    $options = '';

    $now = new DateTime();
    $currentHour = (int)$now->format('H');
    $currentDay = $now->format('Y-m-d');

    if ($selectedDay) {
        // If the selected day is the same as today, filter time slots
        if ($selectedDay == $currentDay) {
            foreach ($timeSlots as $slot) {
                $slotStartHour = (int)explode('-', $slot)[0];
                // Only show slots that are at least 24 hours ahead
                if ($slotStartHour > ($currentHour + 24)) {
                    $options .= "<option value=\"$slot\">$slot</option>";
                }
            }
        } else {
            // Show all time slots for selected day
            foreach ($timeSlots as $slot) {
                $options .= "<option value=\"$slot\">$slot</option>";
            }
        }
    } else {
        // Show all time slots if no day is selected
        foreach ($timeSlots as $slot) {
            $options .= "<option value=\"$slot\">$slot</option>";
        }
    }

    return $options;
}


// SQL query to join CART_PRODUCT and PRODUCT tables
$query = "
    SELECT 
        p.PRODUCT_IMAGE, 
        p.PRODUCT_NAME, 
        cp.QUANTITY, 
        p.PRICE, 
        (cp.QUANTITY * p.PRICE) AS TOTAL_PRICE
    FROM 
        CART_PRODUCT cp
    JOIN 
        PRODUCT p ON cp.PRODUCT_ID = p.PRODUCT_ID
    WHERE 
        cp.CART_ID = :cart_id
";

// Prepare the statement
$stmt = oci_parse($conn, $query);

// Bind the cart_id parameter
oci_bind_by_name($stmt, ':cart_id', $cart_id);

// Execute the statement
oci_execute($stmt);

// Fetch all the rows
$cart_products = [];
while ($row = oci_fetch_assoc($stmt)) {
    $cart_products[] = $row;
}

// Free the statement resource
oci_free_statement($stmt);

// Close the Oracle connection
oci_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C-Fresh</title>
    <link rel="stylesheet" href="checkout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header>
<?php
    if (isset($_SESSION['user_id'])) {
        include('../header/home_header.php');
    } else {
        include('../header/header.php');
    }
?>
</header>
<main>
    <section class="collection-slots">
        <h2>Collection Slots</h2>
        <form action="process_slot.php" method="post">
            <div class="day-slot">
                <label for="day">Day:</label>
                <select id="day" name="date">
                    <option value="">Select Day >></option>
                    <?php echo generateDayOptions(); ?>
                </select>
            </div>
            <div class="time-slot">
                <label for="time">Time:</label>
                <select id="time" name="time">
                    <option value="">Select Time >></option>
                    <?php echo generateTimeOptions(); ?>
                </select>
            </div>
            <button type="submit" name = "choose slot">Choose Slot</button>
        </form>
    </section>


    <section class="product-list">
        <!-- Header row for the product list -->
        <div class="product-header">
            <div class="product-image">Product Image</div>
            <div class="product-name">Product Name</div>
            <div class="product-quantity">Quantity</div>
            <div class="product-price">£ Price</div>
        </div>

        <!-- Loop through each product in the cart and display it -->
        <?php foreach ($cart_products as $product): ?>
            <div class="product-row">
                <div class="product-image">
                    <img src="../image/<?php echo $product['PRODUCT_IMAGE']; ?>" width="80px" height="auto" alt="Image">
                </div>
                <div class="product-name"><?php echo $product['PRODUCT_NAME']; ?></div>
                <div class="product-quantity"><?php echo $product['QUANTITY']; ?></div>
                <div class="product-price">£ <?php echo number_format($product['TOTAL_PRICE'], 2); ?></div>
            </div>
        <?php endforeach; ?>
    </section>

    <section class="order-summary">
        <h2>Order Summary</h2>
        <div class="total-items">Total Items: <span><?php echo count($cart_products); ?> Items</span></div>
        <div class="total-payment">
            Total Payment: 
            <span>
                Total: £ 
                <?php
                $total_payment = array_sum(array_column($cart_products, 'TOTAL_PRICE'));
                echo number_format($total_payment, 2);
                ?>
            </span>
        </div>
        <!-- Form for placing the order -->
        <form action="process_order.php" method="post">
            <!-- Hidden input to store the total price -->
            <input type="hidden" name="total_price" value="<?php echo number_format($total_payment, 2); ?>">
            <button type="submit" class="place-order">Place Order</button>
        </form>    
    </section>
</main>

<footer>
    <div class="footer-container">
        <div class="footer-left">
            <ul>
                <h3>Overview</h3>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Privacy policy</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">FAQs</a></li>
            </ul>
        </div>
        <div class="footer-middle">
            <ul>
                <h3>Available Shops</h3>
                <li>Haricekts Farm</li>
                <li>Dyreborn Holland</li>
                <li>Vitrion</li>
                <li>Barne Pettinger</li>
            </ul>
        </div>
        <div class="footer-right">
            <ul>
                <h3>Shop by Category</h3>
                <li>Vegetables</li>
                <li>Fruits</li>
                <li>Meat & Fish</li>
                <li>Dairy and Bakery</li>
            </ul>
        </div>
        <div class="footer-contact">
            <h3>Contact Us</h3>
            <p>+977-9857011098</p>
            <p>info@c-fresh.com</p>
            <p>Clostkhodesfax, UK</p>
            <h3>Social</h3>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p>&copy; 2024 - C-Fresh. All Rights Reserved.</p>
    </div>
</footer>
</body>
</html>
