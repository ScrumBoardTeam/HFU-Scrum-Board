
<?php

// Variablen zuweisen
  $taskId = $_POST['taskId'];
  $col = $_POST['taskCol'];
  $currentdate = date("Y-m-d", time());			// ermittel momentanes Datum (Y-m-d)


// DBS Verbindung aufbauen
  require_once('./dbsConnect.php');


// SQL Anweisung formen
  if($col == 4){					// wenn abgelegt in Spalte 4 (Abgeschlossen)
    $sql = "UPDATE sb_tasks ".				// SQL-UPDATE von Task-Tabelle
      "SET col='$col', endtime='$currentdate' ".	// setze Col auf Spalte in die gedroppt wurde und Abschluss-Datum auf momentanes Datum
      "WHERE ID=$taskId;";				// von gedraggtem Task
  }
  else{							// wenn abgelegt in Spalte 1, 2 oder 3 (Ausstehend, In Bearbeitung, Testphase)
    $sql = "UPDATE sb_tasks ".				// SQL-UPDATE von Task-Tabelle
      "SET col='$col' ".				// setze Col auf Spalte in die gedroppt wurde
      "WHERE ID=$taskId;";				// von gedraggtem Task
  }


// SQL Anweisung ausführen
  $result = mysqli_query($con, $sql)
    or die('Fehler bei Datenbankabfrage.');


// DBS Verbindung schließen
  mysqli_close($con);

?>