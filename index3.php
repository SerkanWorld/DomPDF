<?php

session_start();
if(isset($_POST['username'])) {
  $_SESSION['username'] = $_POST['username'];
}

if(isset($_POST['password'])) {
  $_SESSION['password'] = $_POST['password'];

}

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
}

if (isset($_SESSION['password'])) {
  $password = $_SESSION['password'];
}


/*
Lädt die autoload.inc.php-Datei von dompdf in den PHP-Skript. 
Die autoload.inc.php-Datei enthält den Code, der benötigt wird, um die dompdf-Klassen und -Funktionen zu laden, wenn sie benötigt werden.
Die require_once-Anweisung stellt sicher, dass die autoload.inc.php-Datei nur einmal geladen wird, auch wenn sie mehrmals aufgerufen wird. */
require_once "dompdf_2-0-3\dompdf\autoload.inc.php";


// Damit wir Dompdf benutzen können :
use Dompdf\Dompdf;

// Options erlaubt es diese auch zu bearbeiten oder Speichern.
use Dompdf\Options;


if (isset($_GET['action']) && $_GET['action'] == 'printdruck') {

  // instantiate and use the dompdf class
  $dompdf = new Dompdf();


  $htmlContent = " <h1> This is a text </h1> 
<p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. 
Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. </p>
<p> hallo $username</p>
<p> Dein Passwort ist $password </p>
";
//Im obigen Teil kann man auch sehen, das bereits definierte Variabeln auch benutzt werden können sowie auch neu erstellte.


//HTML Content laden
$dompdf -> loadHtml($htmlContent);

  // (Optional) Setup the paper size and orientation
  $dompdf->setPaper('Legal', 'Landscape');

  // Render the HTML as PDF
  $dompdf->render();

  // Output the generated PDF (1 = download and 0 = preview)
  $dompdf->stream("test",array("Attachment"=>0));
}
?>

<html>
  <header>
    
  </header>
  <body>
    <form action = "<?php $_PHP_SELF ?>" Method = "Post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username"><br>
      <br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password"><br>
      <br>
      <input type="submit" value="Login">
  </body>
</html>


<a class="hideforpdf" href="index3.php?action=printdruck" target="_blank">Download PDF</a>
