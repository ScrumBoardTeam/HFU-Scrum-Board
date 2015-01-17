
// Board-Inhalte dynamisch generieren, Anzeige der Tasks eines Sprints
function reloadBoard(){

// Sprintmenu dynamisch generieren und am linken Boardrand anzeigen
// displaxSprintlist in jsSprintlist.js
displaySprintlist();

	// AJAX-POST an an dbsGetTasksFromSprint.php
	// ermittelt alle Task-Einträge aus der Datenbank, die nicht als gelöscht markiert sind und zu gewähltem Sprint gehören
	$.ajax({
		type: "POST",
		url: "./dbs/dbsGetTasksFromSprint.php",
		data: {sprint: document.getElementById('inSprint').value},
		success: function(result) {

			// myResult ist 2-Dimensionales Array, wie Tabelle
			// enthält Abfrage-Ergebnis
			var myResult = JSON.parse(result);

			// von jeder Ergebnis-Zeile wird ein Task-Objekt erzeugt und weitergegeben
			for(var i = 0; i < myResult.length; i++){

				// neues Task Objekt erzeugen
				var task = new Task();

				// Objekt-Eigenschaften setzen
				task.setTaskId(myResult[i]['ID']);
				task.setTitle(myResult[i]['title']);
				task.setDescription(myResult[i]['description']);
				task.setType(myResult[i]['type']);
				task.setPriority(myResult[i]['priority']);
				task.setEditor(myResult[i]['editor']);

				// gibt neues TaskObjekt an displayTask() weiter
				// displayTask() erzeugt die Divs, die die Tasks repräsentieren
				// displayTask() in jsTaskDiv.js
				displayTask(task, myResult[i]['col']);
			}
		}
	});
}
