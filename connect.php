<?php $conn = oci_connect('username', 'pw', '//localhost/xe'); 
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit; 
}
 ?>