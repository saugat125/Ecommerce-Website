<?php $conn = oci_connect('sweing', 'cruso122', '//localhost/xe'); 
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit; 
}
?>