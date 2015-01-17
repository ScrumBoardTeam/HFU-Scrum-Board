
<?php

// Variablen zuweisen
  $taskId = $_POST['inTaskId'];
  $title = $_POST['inTitle'];
  $col = $_POST['inCol'];


if($col == '1'){

  // DBS Verbindung aufbauen
    require_once('./dbsConnect.php');


  // SQL Anweisung formen
    $sql = "UPDATE sb_tasks ".	// SQL-UPDATE von Task-Tabelle
      "SET col='5' ".		// col-Spalte wird auf 5 gesetzt, als gelöscht markieren
      "WHERE ID=$taskId;";	// bei gewähltem Task


  // SQL Anweisung ausführen
    $result = mysqli_query($con, $sql)
      or die('Fehler bei Datenbankabfrage.');


  // DBS Verbindung schließen
    mysqli_close($con);

}

?>



<!DOCTYPE html>

<html>
	
<head>

	<title>Aufgabe löschen</title>

	<!-- Einbinden der Stylesheets -->
	<link rel="stylesheet" type="text/css" href="../template/template.css">

</head>

<body>

	<div id="textarea">

	<h2>Aufgabe löschen</h2>

	<?php

	// Ausgabe, wenn gelöscht wurde
	if($col == '1'){
		echo "Die Aufgabe <b><font color='#ba0000'>$title</font color></b> wurde erfolgreich in den Papierkorb verschoben.";
	}

	// Ausgabe, wenn nicht gelöscht wurde
	else{
		echo "Die Aufgabe <b><font color='#ba0000'>$title</font color></b> kann nicht gelöscht werden.<br />";
		echo "Es dürfen nur Aufgaben aus der Spalte <b><font color='#ba0000'>Ausstehend</font color></b> gelöscht werden.<br /><br />";
	}

	?>

	<!-- Zurück-Button -->
	<input type="button" value="Zurück zum Board" onclick="window.parent.location.reload()">

	</div>

</body>

</html>
