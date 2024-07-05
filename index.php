<?php

$text1 = $text2 = $username = $email = $password = "";
session_start();
if(isset($_POST['text1']) && isset($_POST['text2']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
  $_SESSION['text1'] = $_POST['text1'];
  $_SESSION['text2'] = $_POST['text2'];
  $_SESSION['username'] = $_POST['username'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['password'] = $_POST['password'];

}

if(isset($_POST['username'])){
  $_SESSION['username'] = $_POST['username'];
}

if(isset($_POST['email'])){
  $_SESSION['email'] = $_POST['email'];
}

if(isset($_POST['password'])){
  $_SESSION['password'] = $_POST['password'];
}

if(isset($_POST['text1']) && isset($_POST['text2']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
  $_SESSION['text1'];
  $_SESSION['text2'];
  $_SESSION['username'];
  $_SESSION['email'];
  $_SESSION['password'];
  echo "es funktioniert";
}
?>

<form method="post">
  <label for="username">Enter username:</label><br>
  <input type="text" id="username" name="username"> <br>

  <label for="text1">Enter Comment 1:</label><br>
  <input type="text" id="text1" name="text1"> <br>

  <label for="email">Enter email:</label><br>
  <input type="email" id="email" name="email"> <br>

  <label for="password">Enter Password:</label><br>
  <input type="password" id="password" name="password"> <br>

  <label for="text2">Enter Comment 2:</label><br>
  <input type="text" id="text2" name="text2"><br><br>
  <input type="submit" value="Save" >
  
</form>

<form method="post" target="_blank" action="hallo.php">
  <input type="button" value="generate PDF" onclick="window.open('hallo.php', '_blank')">
</form>


<?php
echo "<h2>Your Input:</h2>";
if(isset($_POST['text1']) && isset($_POST['text2']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
  echo $_SESSION['text1'];
  echo "<br>";
  echo $_SESSION['text2'];
  echo "<br>";
  echo $_SESSION['username'];
  echo "<br>";
  echo $_SESSION['email'];
  echo "<br>";
  echo password_hash($password, PASSWORD_DEFAULT, );


}
?>