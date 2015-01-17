<!DOCTYPE html>

<html>
	
<head>

	<title>Product Backlog</title>

	<!-- Einbinden der Stylesheets -->
	<link rel="stylesheet" type="text/css" href="./template/template.css">
	<link rel="stylesheet" type="text/css" href="./template/backlog.css">
	<link rel="stylesheet" type="text/css" href="./template/backlogTask.css">

	<!-- Einbinden von jQuery -->
	<script src="./js/jQuery/jquery-2.1.1.min.js"></script>

	<!-- Einbinden der eigenen Scripts -->
	<script src="./js/jsBacklogDragDrop.js"></script>
	<script src="./js/jsTask.js"></script>
	<script src="./js/jsBacklogTaskDiv.js"></script>
	<script src="./js/jsBacklog.js"></script>

</head>

<!-- Beim Öffnen/Aktualisieren alle Tasks laden -->
<body onload="loadBacklog()">

	<div id="content">

		<h2>Product Backlog</h2>
		
		<!-- Backlog-Bereich, Liste aller Tasks -->
		<div id="backlog" ondrop="drop(event, this)" ondragover="allowDrop(event)">
		</div>

		<div id="sprint">

			<!-- DropDown-Menu zur Auswahl des Sprints -->
			<div id="sprintDdMenu">
			</div>

			<!-- Drop-Bereich zum Ablegen von Tasks -->				
			<div id="dropzone" ondrop="drop(event, this)" ondragover="allowDrop(event)">
				Aufgabe hier ablegen um in den Sprint einzuordnen.
			</div>

		</div>

	</div>

</body>

</html>