
<?php

// Variablen zuweisen
  $title = $_POST['inTitle'];
  $description = $_POST['inDescription'];
  $type = $_POST['inType'];
  $priority = $_POST['inPriority'];
  $editor = $_POST['inEditor'];
  $worktime = $_POST['inWorktime'];


// DBS Verbindung aufbauen
  require_once('./dbsConnect.php');


// SQL Anweisung bauen
  $sql = "INSERT INTO sb_tasks (title, description, type, priority, editor, worktime, col) " .	// SQL-INSERT von neuem Tasks
    "VALUES ('$title', '$description', '$type', '$priority', '$editor', $worktime, 1);";	// füge Titel, Beschreibung, Aufgabentyp, Priorität, Bearbeiter und Aufwand ein
												// setze Spalte (col) von neuem Sprint immer auf Ausstehend (1)

// SQL Anweisung ausführen
  $ergebnis = mysqli_query($con, $sql)
    or die('Fehler bei Datenbankabfrage.');


// DBS Verbindung schließen
  mysqli_close($con);

?>



<!DOCTYPE html>

<html>
	
<head>

	<title>Aufgabe erstellt</title>

	<!-- Einbinden der Stylesheets -->
	<link rel="stylesheet" type="text/css" href="../template/template.css">

</head>

<body>

	<div id="textarea">

	<h2>Aufgabe erstellt</h2>

	<!-- Ausgabe -->
	Die Aufgabe <b><font color="#ba0000"><?php echo $title; ?></font color></b> wurde erfolgreich erstellt.<br /><br />

	<!-- Zurück-Button -->
	<input type="button" value="Zurück zum Board" onclick="window.parent.location.reload()">
	
	</div>

</body>

</html>
