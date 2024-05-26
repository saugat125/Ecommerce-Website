<?php $conn = oci_connect('saugat', 'root', '//localhost/xe');
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit; 
}
?>