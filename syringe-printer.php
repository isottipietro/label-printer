<!--
Printer page for syringe single label
called by single-form POST action
 -->

<?php
//debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//import generator function
require __DIR__ . '/label-generator.php';

//define timestamp variable
$_POST["signTime"] = date("d/m/y-H:i");

//define template to populate
$file = __DIR__ . '/templates/syringe-template.php';
$output = '';

//generate and print label
$output.= generate( $file, $_POST );
print $output;
?>

<!-- printing script -->
<script type="text/javascript">
<!--
window.print();
window.onafterprint = window.close;
//-->
</script>
