<!DOCTYPE html>

<html>
	
<head>

	<title>Neuer Sprint</title>

	<!-- Einbinden der Stylesheets -->
	<link rel="stylesheet" type="text/css" href="./template/template.css">

</head>

<body>

	<div id="content">

	<h2>Neuer Sprint erstellen</h2>

	<!-- Formular zu Erstellung eines Sprints -->
	<form id="myForm" name="myForm" method="POST" action="./dbs/dbsInsertSprint.php">
		<table>
			<tr>
				<!-- Eingabe Sprintstart, Kalender-Feld -->
				<td>Beginn des Sprints:</td>
				<td><input type="date" id="inSprintStart" name="inSprintStart" value=""></td>
			</tr>
			<tr>
				<!-- Eingabe Sprintende, Kalender-Feld -->
				<td>Ende des Sprints:</td>
				<td><input type="date" id="inSprintEnd" name="inSprintEnd" value=""></td>
			</tr>
		</table>

		<br />

		<!-- Submit-Button, Daten werden an dbsInsertSprint.php gesendet -->
		<input type="submit" value="Erstellen">

		<!-- Cancel-Button, Erstellung wird abgebrochen, FancyBox wird geschlossen -->
		<input type="button" value="Abbrechen" onclick="window.parent.location.reload()">

		<!-- Reset-Button, Eingabefelder werden wieder geleert -->
		<input type="reset" value="Zurücksetzen">

	</form>

	</div>


</body>

</html>