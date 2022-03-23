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
require __DIR__ . '/func/label-generator.php';
//define template to populate
$template = __DIR__ . '/templates/syringe-template.php';
$output = $array = '';

if (!empty($_GET)) {
  $origin = __DIR__ . '/resources/' . $_GET['set'] . '.txt';
}

if (!empty($_POST))
{
    // handle post data
    $_POST["signTime"] = date("d/m/y-H:i");
    //generate and print label
    $output.= generate( $template, $_POST );
    print $output;


} else {
  // chiamata elenco
  if ( !file_exists( $origin ) ) {
    return '';
  } else {
    $array = include $origin;
  }
  //generate labels for every iteration and print output
  foreach ($array as $key => $value) {
    $value["signTime"] = date("d/m/y-H:i");
    $output.= generate( $template, $value );
  }
  print $output;
}


?>



<!-- printing script -->
<script type="text/javascript">
<!--
window.print();
window.onafterprint = window.close;
//-->
</script>
