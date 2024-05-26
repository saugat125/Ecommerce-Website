<?php
// Retrieve total price from URL
$total_price = isset($_GET['total_price']) ? $_GET['total_price'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST" id="buyCredits" name="buyCredits">
        <input type="hidden" name="business" value="sb-hdppi30886060@business.example.com" />
        <input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="amount" value="<?php echo $total_price; ?>" />
        <input type="hidden" name="currency_code" value="USD" />
        <input type="hidden" name="cancel_return" value="http://localhost/CFresh/checkout/checkout.php" />
        <input type="hidden" name="return" value="http://localhost/CFresh/checkout/process_order.php?total_price=<?php echo $total_price; ?>" />
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById("buyCredits").submit();
        });
    </script>
</body>
</html>
