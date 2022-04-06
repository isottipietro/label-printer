<?php
  //debug
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  // Connect to database
  $con = mysqli_connect("localhost","acg","IjiurMU8!Cko","areacriticagenerale");

  $id = (int)$_POST['ID'];
  $name = $_POST['Name'];
  $surname = $_POST['Surname'];
  $sex = $_POST['Sex'];
  $dob = $_POST['dob'];

  $sql = "INSERT INTO patients (Patient_ID, Patient_Name, Patient_Surname, Patient_Sex, Patient_DOB) VALUES ($id, '$name', '$surname', $sex, '$dob')";

  if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }

mysqli_close($con);
?>
