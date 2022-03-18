<!DOCTYPE html>
<html>
<body>
<?php
require __DIR__ . '/template.php';
$file = __DIR__ . '/templates/row-template.php';

$rows = array( "id" => 1, "name" => 'first row', 'etc' => 'and more...');

echo "uno";

$output = '';

echo "2";


$output.= template( $file, $rows );


print $output;
?>

</body>
</html>