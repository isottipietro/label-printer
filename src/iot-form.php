<?php
  //debug
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  // define variables and set to empty values
  $patientName = $patientNameErr = $patientID = $signOper = "";

  // Input validation
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$patientName)) {
      $PtNameErr = "Consentiti solo lettere e spazi";
    }
  }
?>
<!-- FORM begins  -->
<h2>Preparazione per l'intubazione programmata</h2>
<p>Con questa funzione puoi stampare le etichette precompilate con i farmaci necessari per l'intubazione programmata (secondo le linee guida aziendali).</p>
<form method="post" action="printer.php?set=iot" target="_blank">
  <fieldset>
    <legend>Paziente</legend>
    Nome e Cognome: <input type="text" name="patientName" value="<?php echo $patientName;?>" required>
    <span class="error"><?php echo $patientNameErr;?></span>
    <br><br>
    ID ricovero: <input type="number" name="patientID" min="2022000000" max="2123000000" value="<?php echo $patientID;?>" required>
  </fieldset>
  <br><br>
  Operatore: <input type="text" name="signOper" value="<?php echo $signOper;?>" placeholder="cognome-123456" required>
  <br><br>
  <input type="submit" name="submit" value="Stampa" class="printbtn"> <input type="reset">
</form>
