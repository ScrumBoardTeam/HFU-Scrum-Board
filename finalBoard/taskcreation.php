    <!DOCTYPE html>

<html>
	
<head>

	<title>Neue Aufgabe</title>

	<!-- Einbinden der Stylesheets -->
	<link rel="stylesheet" type="text/css" href="./template/template.css">

</head>

<body>

	<div id="content">

	<h2>Neue Aufgabe erstellen</h2>

	<!-- Formular zur Erstellung eines Tasks -->
	<form id="myForm" name="myForm" method="POST" action="./dbs/dbsInsertTask.php">
		<table>
			<tr>
				<!-- Eingabe Aufgabentitel, Text-Feld -->
				<td>Titel:</td>
				<td><input type="text" id="inTitle" name="inTitle" value="" maxlength="50" style="width: 370px;">
			</tr>
			<tr>
				<!-- Eingabe Aufgabenbeschreibung, Text-Area -->
				<td style="vertical-align: top;">Beschreibung:</td>
				<td><textarea id="inDescription" name="inDescription" maxlength="400" rows="10" cols="50"></textarea></td>
			</tr>
			<tr>
				<!-- Auswahl Aufgabentyp, DropDown-Menu -->
				<td>Aufgabentyp:</td>
				<td>
					<select id="inType" name="inType">
						<option selected="selected">Aufgabe</option>
						<option>Implementierung</option>
						<option>Test</option>
						<option>Korrektur</option>
						<option>Recherche</option>
						<option>Dokumentation</option>
					</select>
				</td>
			</tr>
			<tr>
				<!-- Auswahl Priorität, DropDown-Menu -->
				<td>Priorität:</td>
				<td>
					<select id="inPriority" name="inPriority">
						<option selected="selected">niedrig</option>
						<option>mittel</option>
						<option>hoch</option>
					</select>
				</td>
			</tr>
			<tr>
				<!-- Eingabe Bearbeiter, Text-Feld -->
				<td>Bearbeiter:</td>
				<td><input type="text" id="inEditor" name="inEditor" value="" maxlength="50"></td>
			</tr>
			<tr>
				<!-- Eingabe Arbeitsaufwand, Zahlen-Feld -->
				<td>Arbeitsaufwand:</td>
				<td><input type="number" id="inWorktime" name="inWorktime" value="" maxlength="10" style="width: 40px;"> Personenstunden</td>
			</tr>
		</table>

		<br />

		<!-- Submit-Button, Daten werden an dbsInsertTask.php gesendet -->
		<input type="submit" value="Erstellen">

		<!-- Cancel-Button, Erstellung wird abgebrochen, FancyBox wird geschlossen -->
		<input type="button" value="Abbrechen" onclick="window.parent.location.reload()">

		<!-- Reset-Button, Eingabefelder werden wieder geleert -->
		<input type="reset" value="Zurücksetzen">

	</form>

	</div>


</body>

</html>