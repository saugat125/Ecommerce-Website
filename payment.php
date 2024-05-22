<body>
    <?php
    $total = 100;
    ?>
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST" id="buyCredits" name="buyCredits">

        <input type="hidden" name="business" value="sb-hdppi30886060@business.example.com" />
        

        <input type="hidden" name="cmd" value="_xclick" />

        <input type="hidden" name="amount" value="<?php echo $total ?> " />

        <input type="hidden" name="currency_code" value="USD" />

        <input type="hidden" name="return" value="http://localhost/hudderhub_fresh/after_payment.php?d=<?php echo urlencode($selectedDay); ?>&date=<?php echo urlencode($selectedDate); ?>&t=<?php echo urlencode($time); ?>&ta=<?php echo urlencode($total); ?>" />

    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            document.getElementById("buyCredits").submit();
        })
    </script>
</body>