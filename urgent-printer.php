<?php
//debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//import generator function
require __DIR__ . '/label-generator.php';

//define template to populate and origin
$template = __DIR__ . '/templates/syringe-template.php';
$origin = __DIR__ . '/resources/urgent.txt';
$output = $array = '';
//$arr = array( "priva" => 'name', "cacca" => 'rollno', "pupu" => 'address');
//file_put_contents('array.txt',  '<?php return ' . var_export($arr, true) . ';');
//import labels array from file
if ( !file_exists( $origin ) ) {
  return '';
} else {
  $array = include $origin;
}

//generate labels for every iteration and print output
foreach ($array as $key => $value) {
  $output.= generate( $template, $value );
}
print $output;
?>

<!-- printing script -->
<script type="text/javascript">
<!--
window.print();
window.onafterprint = window.close;
//-->
</script>
