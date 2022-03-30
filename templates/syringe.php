<!DOCTYPE html>
<!-- Template of the syringe label -->
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto Condensed" />
	<link href="https://fonts.googleapis.com/css?family=Libre Barcode 128" rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="/assets/css/syringe.css">
</head>

<body>
	<div id="item">
		<div id="patient">
			<p><?php print $patientName; ?><span class="id"><?php print $patientID; ?></span></p>
			<p class="barcode"><?php print $patientID; ?></p>
		</div>
		<div id="drug" class="<?php print $warningDrug; ?>"
			<?php if (strlen($drugName)>10 && strlen($drugName)<=13) {
			echo "style='padding: 12px 0 12px 0;'";
		}
		if (strlen($drugName)>13 && strlen($drugName)<=15) {
			echo "style='padding: 14px 0 14px 0;'";
		}
		if (strlen($drugName)>15) {
			echo "style='padding: 16px 0 16px 0;'";
		}?> >
			<p id="drugname" class="<?php print $warningDrugName; ?>"
<?php if (strlen($drugName)>10 && strlen($drugName)<=13) {
	echo "style='font-size: 1.8em;'";
}
if (strlen($drugName)>13 && strlen($drugName)<=15) {
	echo "style='font-size: 1.6em;'";
}
if (strlen($drugName)>15) {
	echo "style='font-size: 1.4em;'";
}?>
				><?php print $drugName; ?></p>
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
