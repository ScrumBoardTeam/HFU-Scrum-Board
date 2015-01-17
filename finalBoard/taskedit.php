<!DOCTYPE html>

<html>
	
<head>

	<title>Aufgabe Bearbeiten</title>

	<!-- Einbinden der Stylesheets -->
	<link rel="stylesheet" type="text/css" href="./template/template.css">

</head>

<body>

	<div id="content">

	<h2>Aufgabendetails ansehen und bearbeiten</h2>

	<!-- Script ermittelt welcher Task ausgewählt wurde und holt entsprechende Daten aus der Datenbank -->
	<?php include("./dbs/dbsGetTaskForEdit.php"); ?>

	<!-- Formular zur Bearbeitung eines Tasks -->
	<form id="myForm" name="myForm" method="POST" action="./dbs/dbsUpdateTask.php">
		<table>
			<tr>
				<!-- Eingabe Aufgabentitel, Text-Feld -->
				<td>Titel:</td>
				<td><input type="text" id="inTitle" name="inTitle" value="<?php echo $row['title'] ?>" maxlength="50" style="width: 370px;">
			</tr>
			<tr>
				<!-- Eingabe Aufgabenbeschreibung, Text-Area -->
				<td>Beschreibung:</td>
				<td><textarea id="inDescription" name="inDescription" maxlength="400" rows="10" cols="50"><?php echo $row['description']; ?></textarea></td>
			</tr>
			<tr>
				<!-- Auswahl Aufgabentyp, DropDown-Menu -->
				<td>Aufgabentyp:</td>
				<td>
					<select id="inType" name="inType">
						<option <?php if($row['type'] === "Aufgabe")		echo 'selected="selected"'; ?> >Aufgabe</option>
						<option <?php if($row['type'] === "Implementierung")	echo 'selected="selected"'; ?> >Implementierung</option>
						<option <?php if($row['type'] === "Test")		echo 'selected="selected"'; ?> >Test</option>
						<option <?php if($row['type'] === "Korrektur")  	echo 'selected="selected"'; ?> >Korrektur</option>
						<option <?php if($row['type'] === "Recherche")  	echo 'selected="selected"'; ?> >Recherche</option>
						<option <?php if($row['type'] === "Dokumentation")	echo 'selected="selected"'; ?> >Dokumentation</option>
					</select>
				</td>
			</tr>
			<tr>
				<!-- Auswahl Priorität, DropDown-Menu -->
				<td>Priorität:</td>
				<td>
					<select id="inPriority" name="inPriority">
						<option <?php if($row['priority'] === "niedrig") echo 'selected="selected"'; ?> >niedrig</option>
						<option <?php if($row['priority'] === "mittel")  echo 'selected="selected"'; ?> >mittel</option>
						<option <?php if($row['priority'] === "hoch")	 echo 'selected="selected"'; ?> >hoch</option>
					</select>
				</td>
			</tr>
			<tr>
				<!-- Eingabe Bearbeiter, Text-Feld -->
				<td>Bearbeiter:</td>
				<td><input type="text" id="inEditor" name="inEditor" value="<?php echo $row['editor']; ?>" maxlength="50"></td>
			</tr>
				<!-- Eingabe Arbeitsaufwand, Zahlen-Feld -->
				<td>Arbeitsaufwand:</td>
				<td><input type="number" id="inWorktime" name="inWorktime" value="<?php echo $row['worktime']; ?>" maxlength="10" style="width: 40px;"> Personenstunden</td>
		</table>

		<!-- Unsichtbares Feld, speichert die Task-ID und gibt sie bei einem Update wieder mit an das Script, damit dieses weiß welcher Task bearbeitet werden muss -->
		<input type="hidden" id="inTaskId" name="inTaskId" value="<?php echo $taskId; ?>">

		<br />

		<!-- Submit-Button, Daten werden an dbsUpdateTask.php gesendet -->
		<input type="submit" value="Speichern">

		<!-- Cancel-Button, Bearbeitung wird abgebrochen, FancyBox wird geschlossen -->
		<input type="button" value="Abbrechen" onclick="window.parent.location.reload()">

		<!-- Reset-Button, Eingabefelder werden wieder geleert -->
		<input type="reset" value="Zurücksetzen">

	</form>

	</div>

</body>

</html>