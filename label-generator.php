<?php
/**
 * Simple Templating function
 *
 * @param $file   - Path to the file that acts as a template.
 * @param $args   - Associative array of variables to pass to the template file.
 * @return string - Output of the template file.
 */
function template( $file, $args ){
  // ensure the file exists
  if ( !file_exists( $file ) ) {
    return '';
  }

  // Make values in the associative array easier to access by extracting them
  if ( is_array( $args ) ){
    extract( $args );
  }

  // buffer the output (including the file is "output")
  ob_start();
    include $file;
  return ob_get_clean();
}

//debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$_POST["signTime"] = date("d/m/y-H:i");

$file = __DIR__ . '/templates/label-template.php';
$output = '';
$output.= template( $file, $_POST );
print $output;
?>
<script type="text/javascript">
<!--
window.print();
window.onafterprint = window.close;
//-->
</script>
