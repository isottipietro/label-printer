<?php
  //debug
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  // define variables and set to empty values
  $patientName = $patientNameErr = $patientID = $drugName = $drugConc = $drugDil = $signOper = $warningDrug = $warningDrugPrep = $warningDrugName = "";

  // Input validation
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$patientName)) {
      $PtNameErr = "Only letters and white space allowed";
    }
  }
?>

<h2>Single Label</h2>
<form method="post" action="label-generator.php" target="_blank" oninput="VolO.value=Number(drugVol.value);drugConc.value=Number(drugDose.value)/Number(drugVol.value) + drugUnit.value + '/ml'">
  <fieldset>
    <legend>Patient</legend>
    Patient Name: <input type="text" name="patientName" value="<?php echo $patientName;?>" placeholder="Nome Cognome" required>
    <span class="error"><?php echo $patientNameErr;?></span>
    <br><br>
    Patient ID: <input type="number" name="patientID" min="2022000000" max="2123000000" value="<?php echo $patientID;?>" required>
  </fieldset>
  <br><br>
  <fieldset>
    <legend>Drug</legend>
	  Drug Name: <input type="text" name="drugName" value="<?php echo $drugName;?>" required>
    <br><br>
    Drug preparation:
    <input type="number" id="drugDose" name="drugDose" min="0" required>
    <select id="drugUnit" name="drugUnit" required>
      <option value="mg" selected>mg</option>
      <option value="mcg">mcg</option>
      <option value="UI">UI</option>
    </select>
    <input type="range" id="drugVol" name="drugVol" min="50" max="250" value="50" step="50" required> <output name="VolO" for="drugVol">50</output> ml
    <select id="drugDil" name="drugDil" required>
      <option value="NS" selected>Normal Saline</option>
      <option value="G5%">Glucose 5%</option>
    </select>
    <br><br>
    Final concentration: <input type="text" name="drugConc" id="drugConc" for="drugDose drugVol drugUnit" readonly style="background : #d3d3d3; border: 0;">
      <br><br>
    Warning:
    <input type="hidden" name="warningDrug" value="">
    <input type="hidden" name="warningDrugPrep" value="">
    <br><input type="checkbox" id="warningDrug" name="warningDrug" value="warning2">
    <label for="warningDrug"> Drug warning - Check this option if drug requires special attention</label><br>
    <input type="checkbox" id="warningDrugPrep" name="warningDrugPrep" value="warning">
    <label for="warningDrug"> Concentration warning - Check this option if drug solution is not the standard one</label>
  </fieldset>
  <br><br>
  Nurse: <input type="text" name="signOper" value="<?php echo $signOper;?>" placeholder="cognome-123456" required>
  <br><br>
  <input type="submit" name="submit" value="Print"> <input type="reset">
</form>
