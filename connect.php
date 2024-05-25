<?php $conn = oci_connect('CFresh', 'Bhattarai#123', '//localhost/xe');
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit; 
}
?>