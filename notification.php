<?php
// notifications.php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    <?php if (isset($_SESSION['message'])): ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            <?php if ($_SESSION['message_type'] == 'success'): ?>
                toastr.success("<?php echo $_SESSION['message']; ?>");
            <?php else: ?>
                toastr.error("<?php echo $_SESSION['message']; ?>");
            <?php endif; ?>
            <?php 
            // Clear the message after displaying it
            unset($_SESSION['message']); 
            unset($_SESSION['message_type']); 
            ?>
        </script>
    <?php endif; ?>
</body>
</html>
