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
  $patientName = $patientNameErr = $patientID = $drugName = $drugConc = $drugDil = $signOper = $warningDrug = $warningDrugPrep = $warningDrugName = "";

  // Input validation
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$patientName)) {
      $PtNameErr = "Consentiti solo lettere e spazi";
    }
  }
?>
<h2>Elenco degenti</h2>
<table>
  <tr>
    <th>ID Ricovero</th>
    <th>Nome</th>
    <th>Cognome</th>
    <th>Sesso</th>
    <th>Data di nascita</th>
    <th>MODIFICA</th>
    <th>ELIMINA</th>
    <th>STAMPA ETICHETTE</th>
  </tr>
    <?php while ($patient = mysqli_fetch_array($all_patients,MYSQLI_ASSOC)):; ?>
      <tr>
        <td><?php echo $patient["Patient_ID"]; ?></td>
        <td><?php echo $patient["Patient_Name"]; ?></td>
        <td><?php echo $patient["Patient_Surname"]; ?></td>
        <td><?php if ($patient["Patient_Sex"]) {
          echo "Maschio";
        } else {
          echo "Femmina";
        } ?></td>
        <td><?php echo $patient["Patient_DOB"]; ?></td>
        <td></td>
        <td><button class="delbtn" name="delete" value="<?php echo $patient['Patient_ID']; ?>">Elimina</button></td>
        <td></td>
      </tr>
    <?php endwhile; ?>
</table>
    <p>&nbsp;</p>
    <div style="width: 50%; display: inline-block;">
<h2>Inserisci un nuovo paziente</h2>
  <form name="NewPatient" id="NewPatient" method="post" action="src/db-insert.php">
    <p>
      <label for="ID">ID Ricovero</label>
      <input type="number" name="ID" min="2122000000" id="ID" required>
    </p>
    <p>
      <label for="Name">Nome </label>
      <input type="text" name="Name" id="Name" required>
    </p>
    <p>
      <label for="Surname">Cognome</label>
      <input type="text" name="Surname" id="Surname" required>
    </p>
    <p>
      Sesso &emsp;
      <input type="radio" id="male" name="Sex" value="1" required>
      <label for="male">Maschio</label>
      <input type="radio" id="female" name="Sex" value="0">
      <label for="female">Femmina</label>
    </p>
    <p>
      <label for="dob">Data di nascita</label>
      <input type="date" id="dob" name="dob" required>
    </p>
    <p>
      <div style="float: right;">
      <button type="submit" name="Submit" id="Submit" value="Submit">Registra</button></div>
  </form>
  <p>&nbsp;</p>
</div>

<script>
$(document).ready(function() {
    $('.delbtn').click(function(){
      if (confirm("Sei sicuro di voler eliminare questo paziente?") == true) {
        var clickBtnValue = $(this).val();
        $.ajax({
          type: "POST",
          url: "src/db-delete.php",
          data: { delete: clickBtnValue }
        }).done(function( msg ) {
          alert( msg );
          location.reload();
        });
      }
    });

  $(function() {
       $('#NewPatient').ajaxForm(function() {
           alert("Paziente inserito correttamente nel database");
           location.reload();
       });
     });
});
</script>
