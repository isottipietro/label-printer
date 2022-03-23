<!DOCTYPE html>
<html lang="it">
<head>
	<?php include 'resources/settings.inc'; ?>
	<title><?php echo $site_title; ?></title>
	<link rel="stylesheet" type="text/css" href="resources/css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<meta charset="UTF-8">
	<meta name="description" content="<?php echo $site_description; ?>">
	<meta name="author" content=" <?php echo $site_author; ?> ">
	<meta property="og:image" content="<?php echo $site_image; ?>" />
</head>
<body>
	<?php include 'header.php'; ?>
	<div id="wrapper">
	<div id="nav">
		<button class="tablink" onclick="openPage('Singola', this, 'green')" id="defaultOpen">Etichetta Singola</button>
		<button class="tablink" onclick="openPage('Intubazione', this, 'green')">Intubazione</button>
		<button class="tablink" onclick="openPage('About', this, 'blue')">Istruzioni</button>
		<button class="tablink urg" onclick="window.open('/printer.php?set=urgent')">Urgenza!</button>
	</div>
	<div id="Singola" class="tabcontent">
		<?php include 'single-form.php';?>
	</div>

	<div id="Intubazione" class="tabcontent">
		<?php include 'iot-form.php'; ?>
	</div>

	<div id="About" class="tabcontent">
		<?php include 'about.php' ?>
	</div>
</div>
  <?php include 'footer.php';?>
	<script>
		function openPage(pageName, elmnt, color) {
		// Hide all elements with class="tabcontent" by default */
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}

		// Remove the background color of all tablinks/buttons
		tablinks = document.getElementsByClassName("tablink");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].style.backgroundColor = "";
		}

		// Show the specific tab content
		document.getElementById(pageName).style.display = "block";

		// Add the specific color to the button used to open the tab content
		elmnt.style.backgroundColor = color;
	}

	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
	</script>
</body>
</html>
