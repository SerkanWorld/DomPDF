<?php

$text1 = "";
session_start();
if(isset($_POST['text1'])) {
  $_SESSION['text1'] = $_POST['text1'];
}

if(isset($_POST['text1'])){
  $_SESSION['text1'];
  echo "es funktioniert";
}
?>

<form method="post">
  <label for="text1">Enter Comment 1:</label><br>
  <input type="text" id="text1" name="text1"> <br>
  <input type="submit" value="Save" >
  
</form>

<form method="post" action="hallo.php">
  <input type="Button"  Value="generate PDF" onclick="location='hallo.php'">
</form>

<?php
echo "<h2>Your Input:</h2>";
if(isset($_POST['text1']) ) {
  echo $_SESSION['text1'];
  echo "<br>";
}
?>
