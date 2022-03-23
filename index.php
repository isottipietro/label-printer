<!DOCTYPE html>
<html lang="it">
<head>
	<title>Label Generator Tool</title>
	<link rel="stylesheet" type="text/css" href="/resources/css/style.css">
  <style>
    .error {color: #FF0000;}

  </style>
</head>
<body>
  <h1>Label Generator Tool</h1>
  <p>v. 0.14</p>
  <img src="resources/images/header.jpg" style="width: 60%; margin-top: -40px; z-index: -1; position: relative;">
  <?php include 'single-form.php';?>
  <br><br>
	<button type="button" onclick="window.open('/printer.php?set=urgent')">FARMACI URGENZA</button>
<button type="button" onclick="window.open('/printer.php?set=intubation')">FARMACI INTUBAZIONE</button>
  <?php include 'footer.php';?>
</body>
</html>
