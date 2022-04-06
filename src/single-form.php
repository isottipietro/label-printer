<!--
Single syringe label form
 -->

<?php
  //debug
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  // Connect to database
  $con = mysqli_connect("localhost","acg","IjiurMU8!Cko","areacriticagenerale");
  // Fetch from database list of patients from table
  $sql = "SELECT * FROM `patients`";
  $all_patients = mysqli_query($con,$sql);

  // define variables and set to empty values
  $patientName = $patientID = $drugName = $drugConc = $drugDil = $signOper = $warningDrug = $warningDrugPrep = $warningDrugName = "";

?>
<!-- FORM begins  -->
<h2>Etichetta singola</h2>
<div class="form">
<form method="post" action="printer.php" target="_blank" oninput="VolO.value=Number(drugVol.value);drugConc.value=Number(drugDose.value)/Number(drugVol.value) + drugUnit.value + '/ml'">
  <fieldset>
    <legend>Paziente</legend>
              <?php
                  // use a while loop to fetch data
                  // from the $all_categories variable
                  // and individually display as an option
                  while ($patient = mysqli_fetch_array(
                          $all_patients,MYSQLI_ASSOC)):;
              ?>
              <span class="patientlabel">
              <input type="radio" id='<?php echo $patient["Patient_ID"]; ?>' class='chk-btn<?php echo $patient["Patient_Sex"]; ?>' name="patientID" value='<?php echo $patient["Patient_ID"]; ?>' required>
              <label for='<?php echo $patient["Patient_ID"]; ?>'><?php echo $patient["Patient_FullName"]; ?></label></span>

              <?php
            endwhile;
              ?>
  </fieldset>
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
      <option value="g">g</option>
      <option value="mEq">mEq</option>
    </select>
     in
    <input type="range" id="drugVol" name="drugVol" min="50" max="250" value="50" step="50" required class="slider"> <output name="VolO" for="drugVol">50</output> ml di
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
    <label for="warningDrugPrep"> CONCENTRAZIONE - Seleziona questa opzione se stai preparando una diluizione non standard</label>
  </fieldset>
  <br><br>
  Operatore: <input type="text" name="signOper" value="<?php echo $signOper;?>" placeholder="cognome-123456" required>
  <br><br>
  <div style="float: right;">
  <input type="submit" name="submit" class="printbtn" value="Stampa"> <input type="reset">
</div><br><br>
</form></div>
