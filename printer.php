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
require __DIR__ . '/src/label-generator.php';
//define template to populate and empty vars
$template = __DIR__ . '/templates/syringe.php';
$output = $dataset = '';
$fp = fopen('var/log/log.txt', 'a');//opens file in append mode

//define source of labels dataset, if exists populate array
if (!empty($_GET)) {
  $source = __DIR__ . '/etc/' . $_GET['set'] . '.txt';
  if ( !file_exists( $source ) ) {
    echo 'ERROR File not exists';
  } else {
    $dataset = include $source;
  }
}

if (empty($_GET)) {
  //generate single label whith _POST as source
  $_POST["signTime"] = date("d/m/y-H:i");
  $output.= generate( $template, $_POST );
  fwrite($fp, $_POST['signOper']." ". $_POST['signTime']. PHP_EOL);
} elseif ($_GET['set'] == 'urgent') {
  //generate labels for every iteration and print output
  foreach ($dataset as $key => $value) {
    $value["signTime"] = date("d/m/y-H:i");
    $output.= generate( $template, $value );
    fwrite($fp, $value['signOper']." ".$value['signTime']. PHP_EOL);
  }
} elseif ($_GET['set'] == 'iot') {
  //generate labels for every iteration (completing source with _POST) and print output
  foreach ($dataset as $key => $value) {
    $value["signTime"] = date("d/m/y-H:i");
    $value['patientName'] = $_POST['patientName'];
    $value['patientID'] = $_POST['patientID'];
    $value['signOper'] = $_POST['signOper'];
    $output.= generate( $template, $value );
    fwrite($fp, $value['signOper']." ".$value['signTime']. PHP_EOL);
  }
}

print $output;

//log
fclose($fp);

?>

<!-- printing script -->
<script type="text/javascript">
<!--
window.print();
window.onafterprint = window.close;
//-->
</script>
