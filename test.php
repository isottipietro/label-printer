<!DOCTYPE html>
<html>
	<body>
		<?php
			require __DIR__ . '/generator.php';
			$file = __DIR__ . '/templates/row-template.php';

			$rows = array( 'id' => 1, 'name' => 'first row', 'etc' => 'and more...');

			$output = '';

			$output.= template( $file, $rows );

			print $output;
		?>
	</body>
</html>
