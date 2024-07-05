<?php
// Damit Daten in anderen Dateien definiert werden können. 
session_start();

// Variabelbezeichnung und definierung von der Index-Datei
if (isset($_SESSION['text1'])) {
    $text1 = $_SESSION['text1'];
  }

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
  }

if (isset($_SESSION['password'])) {
    $password = $_SESSION['password'];
  }

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
  }

if (isset($_SESSION['text2'])) {
    $text2 = $_SESSION['text2'];
  }

// Neue Variabelm direkt erstellen.
$text3 = "Das ist ein 3. Text";

/*
Lädt die autoload.inc.php-Datei von dompdf in den PHP-Skript. 
Die autoload.inc.php-Datei enthält den Code, der benötigt wird, um die dompdf-Klassen und -Funktionen zu laden, wenn sie benötigt werden.
Die require_once-Anweisung stellt sicher, dass die autoload.inc.php-Datei nur einmal geladen wird, auch wenn sie mehrmals aufgerufen wird. */
require_once "dompdf_2-0-3\dompdf\autoload.inc.php";


// Damit wir Dompdf benutzen können :
use Dompdf\Dompdf;

// Options erlaubt es diese auch zu bearbeiten oder Speichern.
use Dompdf\Options;

// gibt weitere Optionsfunktionen und Anpassungen 
$options = new Options();
$options->set('defaultFont', 'Courier');

// Damit weniger Probleme beim Laden der Variabeln entstehen.
$options->set('isRemoteEnabled', true);

// Erstellung der Optionen und PDF-Datei.
$dompdf = new Dompdf($options);
$dompdf = new Dompdf();

/*
Option 1 
PDF in dieser Datei generieren, falls diese nicht gebraucht wird, bitte Auskommentieren oder löschen.
Erstellung vom Content innerhalb der PDF / HTML Datei
*/

//Bilder können auch eingefügt werden. Dies giltet auch für gifs, bmp & jpeg
$path = 'test.jpg';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64pic1 = 'data:image/' . $type . ';base64,' . base64_encode($data);


$htmlContent = "
<h1 > This is a text <h1> 
<p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. 
Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. </p>
<p> Mein name ist: $text1 </p>
<p> Mein Username ist: $username </p>
<p> Mein Passwort ist: $password </p>
<p> Meine Email ist: $email </p>
<p> Zweiter Kommentar: $text2 </p>
<p> $text3 </p>
<img src=$base64pic1 alt=PausLogo

<br><br>

<table>
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
</table>

";
//Im obigen Teil kann man auch sehen, das bereits definierte Variabeln auch benutzt werden können sowie auch neu erstellte.


//HTML Content laden
$dompdf -> loadHtml($htmlContent);

/*
Option 2
PDF in einer anderen Datei generieren, falls diese nicht gebraucht wird, bitte Auskommentieren oder löschen.
Erstellung einer anderen HTML Datei erforderlich.
*/
/*
$html_file_content = file_get_contents("merhaba.html");
$dompdf-> loadHtml($html_file_content);
*/



// Format des PDF’s
$dompdf->setPaper ('A4', 'Landscape');

//Rendert das PDF-Dokument und bereitet es für die Ausgabe vor.
$dompdf->render();

/*
Methode gibt den generierten PDF-Inhalt an den Browser zurück, damit er angezeigt oder heruntergeladen werden kann. 
Der erste Parameter 'document' ist der Name der Datei, die generiert wird. 
Der zweite Parameter array('Attachment' => 0) gibt an, dass die Datei nicht als Anhang heruntergeladen werden soll, sondern im Browserfenster geöffnet werden soll .
*/

// $dompdf->stream('document', array('Attachment' => 0));

// $dompdf-> stream("pasta/doc/relatorio.pdf", array("Attachment" => false));

// $dompdf->stream('my.pdf',array('Attachment'=>0));

// $dompdf->stream("document.pdf");


// $output = $dompdf->output();

 $dompdf->stream("Text.pdf", array("Attachment" => false));


/*
$htmlContent = header("Content-type:application/pdf");

// It will be called downloaded.pdf
$htmlContent = header("Content-Disposition:attachment;filename=\"downloaded.pdf\"");

// The PDF source is in original.pdf
$htmlContent = readfile("original.pdf");

*/


?>


