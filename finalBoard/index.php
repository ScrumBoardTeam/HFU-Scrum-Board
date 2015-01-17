<!DOCTYPE html>

<html>
	
<head>

	<title>Scrum Board</title>

	<!-- Einbinden der Stylesheets -->
	<link rel="stylesheet" type="text/css" href="./template/animations.css">
	<link rel="stylesheet" type="text/css" href="./template/template.css">
	<link rel="stylesheet" type="text/css" href="./template/menu.css">
	<link rel="stylesheet" type="text/css" href="./template/sprintlist.css">
	<link rel="stylesheet" type="text/css" href="./template/board.css">
	<link rel="stylesheet" type="text/css" href="./template/task.css">

	<!-- Einbinden von jQuery -->
	<script src="./js/jQuery/jquery-2.1.1.min.js"></script>

	<!-- Einbinden der eigenen Scripts -->
	<script src="./js/jsDragDrop.js"></script>
	<script src="./js/jsTask.js"></script>
	<script src="./js/jsTaskDiv.js"></script>
	<script src="./js/jsSprintlist.js"></script>
	<script src="./js/jsReloadBoard.js"></script>

	<!-- Einbinden des FancyBox-Plugins -->
	  <!-- FancyBox-Plugin Stylesheet -->
	  <link rel="stylesheet" href="./js/fancyBox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	
	  <!-- FancyBox-Plugin Scripte -->
	  <script src="./js/fancyBox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

	  <!-- Eigenes FancyBox-Script zur Konfiguration des Plugins -->
	  <script src="./js/jsFancyBox.js"></script>

</head>

<!-- Beim Öffnen/Aktualisieren alle Tasks laden -->
<body onload="reloadBoard()">

	<!-- alles umfassender Wrapper-Container, zentriert -->
	<div id="wrapper">

		<!-- Header-Contaier: Logo und Hauptmenu -->
		<div id="header">

			<!-- Logo: Symbol, rotierend -->
			<div id="logo_left">
			</div>

			<!-- Logo: Schriftzug, aufblinkend -->
			<div id="logo_right">
			</div>

			<!-- Hauptmenu: Task erstellen, Chart aufrufen, Sprint erstellen, Backlog aufrufen -->
			<div id="menu">
				<?php include("./menu.php"); ?>
			</div>

		</div>

		<!-- Haupt-Contaier: Board + Sprintmenu -->
		<div id="main">

			<!-- Sprintmenu: Alle in der Datenbank verzeichneten Sprints gelistet -->
			<div id="sprintlist">
			</div>

			<!-- Board-Contaier -->
			<div id="board">

				<!-- Board-Contaier Kopfzeile -->
				<div id="board_top">

					<!-- Unsichtbares Formularfeld, beinhaltet Sprint-ID -->
					<input type="hidden" id="inSprint" name="inSprint" value="<?php echo $_GET['id']; ?>">

				</div>

				<!-- Board-Contaier Aufgabenbereich -->
				<div id="board_mid">

					<!-- Spalte: Ausstehend, ist Droparea -->
					<div id="col_toDo" ondrop="drop(event, this)" ondragover="allowDrop(event)">
					</div>

					<!-- Spalte: In Bearbeitung, ist Droparea -->
					<div id="col_inPr" ondrop="drop(event, this)" ondragover="allowDrop(event)">
					</div>

					<!-- Spalte: Testphase, ist Droparea -->
					<div id="col_test" ondrop="drop(event, this)" ondragover="allowDrop(event)">
					</div>

					<!-- Spalte: Fertiggestellt, ist Droparea -->
					<div id="col_done" ondrop="drop(event, this)" ondragover="allowDrop(event)">
					</div>

				</div>

				<!-- Board-Contaier Fußzeile -->
				<div id="board_bot">
				</div>

			</div>

		</div>

		<!-- Footer-Container: Copyright, Teilnehmer, Hochschule, Impressum -->
		<div id="footer">
			<?php include("./footer.php"); ?>
		</div>

	</div>

</body>

</html>
