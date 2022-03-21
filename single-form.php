<!--
Single syringe label form
 -->

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
      $PtNameErr = "Consentiti solo lettere e spazi";
    }
  }
?>
<!-- FORM begins  -->
<h2>Etichetta singola</h2>
<form method="post" action="syringe-printer.php" target="_blank" oninput="VolO.value=Number(drugVol.value);drugConc.value=Number(drugDose.value)/Number(drugVol.value) + drugUnit.value + '/ml'">
  <fieldset>
    <legend>Paziente</legend>
    Nome e Cognome: <input type="text" name="patientName" value="<?php echo $patientName;?>" required>
    <span class="error"><?php echo $patientNameErr;?></span>
    <br><br>
    ID ricovero: <input type="number" name="patientID" min="2022000000" max="2123000000" value="<?php echo $patientID;?>" required>
  </fieldset>
  <br><br>
  <fieldset>
    <legend>Farmaco</legend>
	  Principio attivo: <input type="text" name="drugName" value="<?php echo $drugName;?>" required>
    <br><br>
    Preparazione:
    <input type="number" id="drugDose" name="drugDose" min="0" placeholder="Dose" required>
    <select id="drugUnit" name="drugUnit" required>
      <option value="mg" selected>mg</option>
      <option value="mcg">mcg</option>
      <option value="UI">UI</option>
    </select>
     in
    <input type="range" id="drugVol" name="drugVol" min="50" max="250" value="50" step="50" required> <output name="VolO" for="drugVol">50</output> ml di
    <select id="drugDil" name="drugDil" required>
      <option value="SF" selected>Soluzione Fisiologica</option>
      <option value="G5%">Glucosata 5%</option>
      <option value="H2O">Acqua per preparazioni inettabili</option>
      <option value="">Non diluito</option>
    </select>
    <br><br>
    Concentrazione finale: <input type="text" name="drugConc" id="drugConc" for="drugDose drugVol drugUnit" readonly style="background : #d3d3d3; border: 0;">
      <br><br>
    Avvertenze:
    <input type="hidden" name="warningDrug" value="">
    <input type="hidden" name="warningDrugPrep" value="">
    <br><input type="checkbox" id="warningDrug" name="warningDrug" value="warning2">
    <label for="warningDrug"> FARMACO - Seleziona questa opzione se il farmaco da somministrare richiede particolare attenzione</label><br>
    <input type="checkbox" id="warningDrugPrep" name="warningDrugPrep" value="warning">
    <label for="warningDrug"> CONCENTRAZIONE - Seleziona questa opzione se stai preparando una diluizione non standard</label>
  </fieldset>
  <br><br>
  Operatore: <input type="text" name="signOper" value="<?php echo $signOper;?>" placeholder="cognome-123456" required>
  <br><br>
  <input type="submit" name="submit" value="Stampa"> <input type="reset">
</form>
