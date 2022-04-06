<!DOCTYPE html>
<html lang="it">
<head>
	<?php include 'etc/settings.inc'; ?>
	<title><?php echo $site_title; ?></title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<meta charset="UTF-8">
	<meta name="description" content="<?php echo $site_description; ?>">
	<meta name="author" content=" <?php echo $site_author; ?> ">
	<meta property="og:image" content="<?php echo $site_image; ?>" />
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
	<script src="src/menubar.js" defer></script>
	<script src="src/collapsible.js" defer></script>
</head>
<body>
	<div id="wrapper">
		<?php include 'src/header.php'; ?>
	<div id="nav">
		<button class="tablink" onclick="openPage('Singola', this, 'green')" id="defaultOpen">Etichetta Singola</button>
		<button class="tablink" onclick="openPage('Intubazione', this, 'green')">Intubazione</button>
		<button class="tablink" onclick="openPage('About', this, 'blue')">Istruzioni</button>
		<button class="tablink" onclick="openPage('Registry', this, 'blue')">Anagrafiche</button>
		<button class="tablink urg" onclick="window.open('/printer.php?set=urgent')">Urgenza!</button>
	</div>
	<div id="Singola" class="tabcontent">
		<?php include 'src/single-form.php';?>
	</div>

	<div id="Intubazione" class="tabcontent">
		<?php include 'src/iot-form.php'; ?>
	</div>

	<div id="About" class="tabcontent">
		<?php include 'src/about.php' ?>
	</div>

	<div id="Registry" class="tabcontent">
		<?php include 'src/patient-registry.php' ?>
	</div>

</div>
  <?php include 'src/footer.php';?>
</body>
</html>
