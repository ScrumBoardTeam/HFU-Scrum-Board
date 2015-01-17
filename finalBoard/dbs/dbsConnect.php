
<?php

// DBS Verbindung aufbauen
  $con = mysqli_connect('localhost', 'root', '', 'scrumboard')	// Ziel-Server, Nutzername, Passwort, Datenbank-Name
    or die('Fehler beim Verbinden mit MySQL-Server.');

?>