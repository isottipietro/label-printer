<?php
  //debug
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  // Connect to database
  $con = mysqli_connect("localhost","acg","IjiurMU8!Cko","areacriticagenerale");

  $id = (int)$_POST['delete'];

  if (mysqli_query($con, "DELETE FROM patients WHERE Patient_ID='".$id."'")) {
    echo "Il paziente ".$id." è stato cancellato dal database.";
    }
    else {
      echo "Non cancellato";
    }
?>
