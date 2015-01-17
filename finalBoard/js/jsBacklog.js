
// Backlog dynamisch generieren, Liste der Tasks
function loadBacklog(){

	// Erstellung der Sprintauswahl
	// siehe Fkt weiter unten
	createSprintDdMenu()

	// AJAX-GET an an dbsGetTasks.php
	// ermittelt alle Task-Einträge aus der Datenbank, die nicht als gelöscht markiert sind
	$.ajax({
		type: "GET",
		url: "./dbs/dbsGetTasks.php",
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
				displayTask(task);
			}
		}
	});
}



// Sprint Dropdown-Menu dynamisch generieren
function createSprintDdMenu(){

	// AJAX-Get an an dbsGetSprints.php
	// ermittelt alle Sprint-Einträge aus der Datenbank
	$.ajax({
		type: "GET",
		url: "./dbs/dbsGetSprints.php",
		success: function(result) {

			// myResult ist 2-Dimensionales Array, wie Tabelle
			// enthält Abfrage-Ergebnis
			var myResult = JSON.parse(result);

			// DropDown-Auswahl wird generiert
			var mySelect = document.createElement("select");

			// Attribute für DropDown-Auswahl werden gesetzt
			mySelect.setAttribute("id", "ddSprint");
			mySelect.setAttribute("name", "ddSprint");
			mySelect.setAttribute("style", "width: 150px;");

			// für jeden Sprint wird eine Option zum auswählen generiert
			for(var i = 1; i <= myResult.length; i++){

				// Option-Element wird generiert
				var option = document.createElement("option");
    				option.value = "Sprint "+i;
    				option.text = "Sprint "+i;

				// neue Option-Element wird Auswahl hinzugefügt
    				mySelect.appendChild(option);
			}

			// Auswahl wird in sprintddMenu-Div gelegt
			sprintDdMenu.appendChild(mySelect);
		}
	});
}
