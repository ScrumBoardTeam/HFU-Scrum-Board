
// Drag & Drop Funktion auf dem Board
function allowDrop(ev){

	ev.preventDefault();
}

function drag(ev){

	// registriert text/html Inhalt des draggenden Divs zum Mitziehen
	ev.dataTransfer.setData("text/html", ev.target.id);

	// senkt für die Zeit des Draggens die Deckkraft aller Task-Elemente
	$(".task").each(function(index, element) {
			element.setAttribute("style", "opacity: 0.3");
	});

	// erhöht die Deckkraft des draggenden Task-Element wieder auf 100%
	document.getElementById(ev.target.id).setAttribute("style", "opacity: 1.0");
}

function drop(ev, dropZone){

	ev.preventDefault();

	// ermittelt ID des droppenden Divs zum Absetzen
	var data = ev.dataTransfer.getData("text/html");

	// droppendes Div wird in entsprechende Spalte gelegt
	dropZone.appendChild(document.getElementById(data));

	// Datenbank-ID des droppenden Divs wird über Div-ID ermittelt
	var split = data.split('_', 2);

	// Spalte des droppenden Divs wird in Datenbank aktualisiert
	// Fkt weiter unten
	updateColInDbs(split[1], $(dropZone).attr('id'));

	// erhöht die Deckkraft aller Task-Elemente wieder auf 100%
	$(".task").each(function(index, element) {
		element.setAttribute("style", "opacity: 1.0");
	});
}



// Spalte des droppenden Divs wird in Datenbank aktualisiert
// Übergabe von Datenbank Task-ID und HTML Spalten-ID
function updateColInDbs(id, col){

	// Festlegung von col anhand der HTML Spalten-ID
	// col ist Wert, der in Datenbank gespeichert wird
	switch(col) {
    	  case 'col_toDo':
            col = 1;
            break;
    	  case 'col_inPr':
            col = 2;
            break;
    	  case 'col_test':
            col = 3;
            break;
    	  case 'col_done':
            col = 4;
            break;
    	  default:
	}

	// AJAX-POST an an dbsUpdateCol.php
	// setzt Datenbank-Atrribut Col auf Wert von col (kann 1, 2, 3 oder 4 sein)
	$.ajax({
		type: "POST",
		url: "./dbs/dbsUpdateCol.php",
		data: {taskId: id, taskCol: col},
	});
}