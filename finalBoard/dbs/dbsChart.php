
<?php

// Variablen zuweisen
  $sprint = $_GET['id'];		// gewählter Sprint


// DBS Verbindung aufbauen
  require_once('./dbs/dbsConnect.php');


// SQL Anweisung formen
  $sql = "SELECT startdate, enddate ".	// Start und End-Datum auslesen
	 "FROM sb_sprints ".		// von Sprint-Tabelle 
	 "WHERE id = $sprint;";		// von gewähltem Sprint


// SQL Anweisung ausführen
  $result = mysqli_query($con, $sql)
    or die('Fehler bei Datenbankabfrage.');


// Ergebnis in Array speichern
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);



// SQL Anweisung 2 formen
  $sql2 = "SELECT endtime, worktime ".	// Abschluss-Datum und Aufwand auslesen
	 "FROM sb_tasks ".		// von Task-Tabelle
	 "WHERE sprint = $sprint ".	// von gewähltem Sprint
	 "AND col = 4 ". 		// nur abgeschlossene Tasks
	 "AND endtime IS NOT NULL;";	// prüfen, dass End-Datum vorhanden ist


// SQL Anweisung ausführen
  $result2 = mysqli_query($con, $sql2)
    or die('Fehler bei Datenbankabfrage.');


// Ergebnis in Array speichern
  $row2 = mysqli_fetch_all($result2, MYSQLI_NUM);



// SQL Anweisung 3 formen
  $sql3 = "SELECT SUM(worktime) ".	// addiere Aufwand => Komplettaufwand des Sprints
	 "FROM sb_tasks ".		// von Task-Tabelle
	 "WHERE sprint = $sprint;";	// von gewähltem Sprint


// SQL Anweisung 3 ausführen
  $result3 = mysqli_query($con, $sql3)
    or die('Fehler bei Datenbankabfrage.');


// Ergebnis in Array speichern
  $sum = mysqli_fetch_array($result3, MYSQLI_NUM);


// DBS Verbindung schließen
  mysqli_close($con);



$startdate = $row['startdate'];		// erzeuge Variable mit Sprint-Start-Datum (Y-m-d)
$enddate = $row['enddate'];		// erzeuge Variable mit Sprint-End-Datum   (Y-m-d)
$currentdate = date("Y-m-d", time());	// erzeuge Variable mit aktuellem Datum    (Y-m-d)



$partsS = explode("-", $startdate, 3);					// zerlege Start-Datum ([0]=Y, [1]=m, [2]=d)
$starttime = mktime(0, 0, 0, $partsS[1], $partsS[2], $partsS[0]);	// erzeuge Unix-Timestamp aus zerlegten Werten von zuvor
$partsE = explode("-", $enddate, 3);					// zerlege End-Datum   ([0]=Y, [1]=m, [2]=d)
$endtime = mktime(0, 0, 0, $partsE[1], $partsE[2], $partsE[0]);		// erzeuge Unix-Timestamp aus zerlegten Werten von zuvor
$currenttime = time();							// erzeuge Unix-Timestamp mit aktuellem Datum

if($currenttime > $endtime){	// wenn End-Datum schon verstrichen
  $currenttime = $endtime;	// setze "momentane" Zeit auf Enddatum
}				// da Chart dann nur bis Enddatum gehen darf



$gonetime = $currenttime - $starttime;			// berechne vergangene Zeit in Sekunden
$gonetimeDay = floor($gonetime / 86400);		// berechne vergangene Zeit in Tagen
$sprintduration = ($endtime - $starttime) / 86400;	// berechne komplette Sprintdauer



$xAxis = "";					// erzeuge Werte-String für x-Achse

for($i = 1; $i <= $sprintduration; $i++){	// erweitere String mit Tag bis Sprintdauer erreicht
  $xAxis = $xAxis . ",$i";			// erweitere String mit ",(Tag)"
}
$xAxis1 = substr($xAxis, 1);			// schneide erstes Komma ab



$yAxis = array_fill(0, $gonetimeDay + 1, 0);		// erzeuge Werte-Array entsprechend der Sprintlänge mit je dem Wert 0
$yAxis1 = array_fill(0, $gonetimeDay + 1, $sum[0]);	// erzeuge Werte-Array entsprechend der Sprintlänge für y-Achse mit je dem Gesamtaufwand
$yAxis2 = "";						// erzeuge Werte String für y-Achse



for($i = 0; $i < sizeof($row2); $i++){									// berechne für jeden Tag den abgeschlossenen Aufwand
  $partsT = explode("-", $row2[$i][0], 3);								// zerlege Abschluss-Datum des Tasks ([0]=Y, [1]=m, [2]=d)
  $difftime = floor((mktime(0, 0, 0, $partsT[1], $partsT[2], $partsT[0]) - $starttime) / 86400);	// erzeuge Unix-Timestamp davon und berechne Differenz zum Sprint-Start-Datum
  $yAxis[$difftime] = $yAxis[$difftime] + $row2[$i][1];							// addiere an entsprechendem Tag den entsprechenden abgeschlossenen Aufwand dazu
}

for($i = 0; $i < sizeof($yAxis); $i++){		// berechne verbleibenden Aufwand für jeden Tag
  for($x = 0; $x <= $i; $x++){			// berechne durch Subtraktion aller bereits vergangener Tage relativ zum entsprechenden Tag
    $yAxis1[$i] = $yAxis1[$i] - $yAxis[$x];	// subtrahiere abgeschlossenen Aufwand gespeichert in yAxis vom Komplettaufwand in yAxis1
  }
}

for($i = 0; $i < sizeof($yAxis1); $i++){	// übertrage Werte-Array yAxis1 in Werte-String yAxis2
  $yAxis2 = $yAxis2 . ",$yAxis1[$i]";		// erweitere String mit ",(Wert aus yAxis1 von TagX)"
}

$yAxis3 = substr($yAxis2, 1);			// schneide erstes Komma ab



// Ausgabe
echo "<h2>Burn-down Chart</h2>";

// gebe Sprint-Nr mit Start- und End-Datum aus
echo "Sprint $sprint: ". date('d.m.Y', $starttime) ." bis ". date('d.m.Y', $endtime) ." <br />";

// gebe Sprintdauer, Anzahl verstrichener Tage und Anzahl verbleibender Tage aus
echo "$sprintduration Tage insgesamt, $gonetimeDay Tage verstrichen, ". ($sprintduration - $gonetimeDay) ." Tage verbleibend <br />";

// gebe Chart aus
// dazu wird der Online-Chart-Generator von http://apps.vanpuffelen.net genutzt
// diesem werden unsere Werte-Strings für die x- und y-Achse übergeben
// als Ergebnis erhalten wir ein .png-Bild, welches in unsere Seite eingebunden wird
echo "<img src='http://apps.vanpuffelen.net/charts/burndown.jsp?days=" . $xAxis1 . "&work=" . $yAxis3 . "&format=.png'>";

?>
