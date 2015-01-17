
// Drag & Drop Funktion im Backlog
function allowDrop(ev){

	ev.preventDefault();
}

function drag(ev){

	ev.dataTransfer.setData("text/html", ev.target.id);

	// senkt für die Zeit des Draggens die Deckkraft aller Task-Elemente
	$(".task").each(function(index, element) {
			element.setAttribute("style", "opacity: 0.3");
	});

	// erhöht die Deckkraft des draggenden Task-Element wieder auf 100%
	document.getElementById(ev.target.id).setAttribute("style", "opacity: 1.0");

	// ändert für die Zeit des Draggens die Hintergrundfarbe des Drop-Bereichs zu blassgelb
	document.getElementById("dropzone").setAttribute("style", "background: #ebeac2");

}

function drop(ev, dropZone){

	ev.preventDefault();

	// ermittelt ID des droppenden Divs
	var data = ev.dataTransfer.getData("text/html");

	// Datenbank-ID des droppenden Divs wird über Div-ID ermittelt
	var splitData = data.split('_', 2);

	// Datenbank-ID des gewählten Sprints wird über Wert in der Auswahl ermittelt
	var splitSprint = document.getElementById('ddSprint').value.split(' ', 2);

	// Sprint des droppenden Divs wird in Datenbank aktualisiert
	// Fkt weiter unten
	updateSprintInDbs(splitData[1], splitSprint[1]);

	// erhöht die Deckkraft aller Task-Elemente wieder auf 100%
	$(".task").each(function(index, element) {
		element.setAttribute("style", "opacity: 1.0");
	});

	// ändert die Hintergrundfarbe des Drop-Bereichs wieder zu weiß
	document.getElementById("dropzone").setAttribute("style", "background: #ffffff");
}



// Sprint des droppenden Divs wird in Datenbank aktualisiert
// Übergabe von Datenbank Task-ID und Datenbank Sprint-ID
function updateSprintInDbs(id, sprint){

	// AJAX-POST an an dbsUpdateSprint.php
	// setzt Datenbank-Atrribut Sprint auf Wert von sprint (kann 1 bis x sein, wobei x = größte Sprint-ID)
	$.ajax({
		type: "POST",
		url: "./dbs/dbsUpdateSprint.php",
		data: {taskId: id, taskSprint: sprint},
	});
}