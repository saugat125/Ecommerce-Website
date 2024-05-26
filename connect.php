<<<<<<< HEAD
<?php $conn = oci_connect('CFresh', 'Bhattarai#123', '//localhost/xe');
=======
<?php $conn = oci_connect('saugat', 'root', '//localhost/xe');
>>>>>>> e69e1565fe4fbd416bfc1d8cadc4a3eda4812439
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit; 
}
?>