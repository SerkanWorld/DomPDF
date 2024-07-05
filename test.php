<?php

// Damit Daten in anderen Dateien definiert werden können. 
sesseion_start();

// Variabelbezeichnung und definierung
if (isset($_SESSION['text1'])) {
    $text1 = $_SESSION['text1'];
  }


  

// Variabel Wert geben
    $text1 = $_SESSION['text1'] = "Max Musterman";
    

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


// Option 1, PDF in dieser Datei generieren, falls diese nicht gebraucht wird, bitte Auskommentieren oder löschen.
// Erstellung vom Content innerhalb der PDF / HTML Datei
$htmlContent = "
<h1 > This is a text <h1> 
<p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. 
Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. </p>";

// Wenn die Variabeln richtig definiert wurden, kann man diese auch Einfügen.
"<p>Mein name ist:  $test1 </p>
";


// Option 2, PDF in einer anderen Datei generieren, falls diese nicht gebraucht wird, bitte Auskommentieren oder löschen.
// Erstellung einer anderen HTML Datei erforderlich.
$html_file_content = file_get_contents("FILENAME.html");
$dompdf-> loadHtml($html_file_content);


//HTML Content laden
$dompdf -> loadHtml($htmlContent) ;

// Format des PDF’s
$dompdf->setPaper ('A4', 'Landscape');

//Rendert das PDF-Dokument und bereitet es für die Ausgabe vor.
$dompdf->render();

/*
Methode gibt den generierten PDF-Inhalt an den Browser zurück, damit er angezeigt oder heruntergeladen werden kann. 
Der erste Parameter 'document' ist der Name der Datei, die generiert wird. 
Der zweite Parameter array('Attachment' => 0) gibt an, dass die Datei nicht als Anhang heruntergeladen werden soll, sondern im Browserfenster geöffnet werden soll .
*/
$dompdf->stream('document', array('Attachment' => 0));
