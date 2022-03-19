<!DOCTYPE HTML>  
<html>
  <head>
    <style>
      .error {color: #FF0000;}
    </style>
  </head>
  <body>  

  <?php
	require __DIR__ . '/generator.php';
	$file = __DIR__ . '/templates/label-template.php';
    // define variables and set to empty values
    $PtNameErr = $PtIdErr = $NurseErr = $DrugErr = "";
    $PtName = $PtId = $Nurse = $Drug = $Prep = "";

    // Input validation
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["PtName"])) {
        $PtNameErr = "Patient name is required";
      } else {
        $PtNme = test_input($_POST["PtName"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$PtName)) {
          $PtNameErr = "Only letters and white space allowed";
        }
      }
  
      if (empty($_POST["PtId"])) {
        $PtIdErr = "Patient ID is required";
      } else {
        $PtId = test_input($_POST["PtId"]);
        // check if e-mail address is well-formed
        //if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //  $emailErr = "Invalid email format";
        //} //da correggere per validazione id
      }
    
      if (empty($_POST["Nurse"])) {
        $Nurse = "";
      } else {
        $Nurse = test_input($_POST["Nurse"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        //if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
        //  $websiteErr = "Invalid URL";
        //} //correggere validazione cognome-matricola
      }

      if (empty($_POST["Prep"])) {
        $Prep = "";
      } else {
        $Prep = test_input($_POST["Prep"]);
      }

      if (empty($_POST["Drug"])) {
        $DrugErr = "Drug name is required";
      } else {
        $Drug = test_input($_POST["Drug"]);
      }
    }*/

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  ?>

  <h2>Label Form Example</h2>
  <p><span class="error">* required field</span></p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Patient Name: <input type="text" name="PtName" value="<?php echo $PtName;?>">
    <span class="error">* <?php echo $nameErr;?></span>
    <br>
    Patient ID: <input type="number" name="PtId" min="2022000000" max="2123000000" value="<?php echo $PtId;?>">
    <span class="error">* <?php echo $PtIdErr;?></span>
    <br>
   Nurse: <input type="text" name="Nurse" value="<?php echo $Nurse;?>">
    <span class="error"><?php echo $NurseErr;?></span>
    <br>
		Drug: <select id="Drugs" name="Drugs">
			<option value="NORADRENALINA">Noradrenalina</option>
			<option value="EPARINA">Eparina</option>
			<option value="MIDAZOLAM">Midazolam</option>
			<option value="ROCURONIO">Rocuronio</option>
		</select>
   <br><br>
    <input type="submit" name="submit" value="Submit">  
  </form>

  <?php
    echo "<h2>Your Input:</h2>";
    echo $PtName;
    echo "<br>";
    echo $PtId;
    echo "<br>";
    echo $Nurse;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
  ?>

</body>
</html>
