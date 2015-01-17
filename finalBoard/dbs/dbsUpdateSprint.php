
<?php

// Variablen zuweisen
  $taskId = $_POST['taskId'];
  $sprint = $_POST['taskSprint'];


// DBS Verbindung aufbauen
  require_once('./dbsConnect.php');


// SQL Anweisung formen
  $sql = "UPDATE sb_tasks ".	// SQL-UPDATE von Task-Tabelle
    "SET sprint=$sprint ".	// setze sprint auf Sprint der im Backlog ausgewählt ist
    "WHERE ID=$taskId;";	// von gedraggtem Task


// SQL Anweisung ausführen
  $result = mysqli_query($con, $sql)
    or die('Fehler bei Datenbankabfrage.');


// DBS Verbindung schließen
  mysqli_close($con);

?>