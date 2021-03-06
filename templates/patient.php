<!DOCTYPE html>
<!-- Template of the patient label -->
<html lang="it">
<head>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto Condensed" />
	<link href="https://fonts.googleapis.com/css?family=Libre Barcode 128" rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="/assets/css/patient.css">
</head>

<body>
	<div id="item">
		<div id="patient">
			<p><?php print $patientName; ?><span class="id"><?php print $patientID; ?></span></p>
			<p class="barcode"><?php print $patientID; ?></p>
		</div>
		<div id="drug" class="<?php print $warningDrug; ?>">
			<p id="drugname" class="<?php print $warningDrug; ?>"><?php print $drugName; ?></p>
			<div id="preparation" class="<?php print $warningDrugPrep; ?>">
				<p class="conc">[<?php print $drugConc; ?>]<span class="dilution"><?php print $drugDose; ?><?php print $drugUnit;?>/<?php print $drugVol; ?>ml <?php print $drugDil; ?></span></p>
			</div>
		</div>
		<div id="signature">
		<p><?php print $signOper; ?><span class="timestamp"><?php print $signTime; ?></span></p>
		</div>
	</div>
<div class="pagebreak"> </div>
</body>
</html>
