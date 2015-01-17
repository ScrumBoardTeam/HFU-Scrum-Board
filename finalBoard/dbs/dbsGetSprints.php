
<?php

// DBS Verbindung aufbauen
  require_once('./dbsConnect.php');


// SQL Anweisung bauen
  $sql = "SELECT * ".		// alles auslesen
	 "FROM sb_sprints;";	// von Sprint-Tabelle 


// SQL Anweisung ausführen
  $result = mysqli_query($con, $sql)
    or die('Fehler bei Datenbankabfrage.');


// Ergebnis in Array speichern
  $row = mysqli_fetch_all($result, MYSQLI_ASSOC);


// DBS Verbindung schließen
  mysqli_close($con);


// Ergebnis zurücksenden
echo json_encode($row);

?>