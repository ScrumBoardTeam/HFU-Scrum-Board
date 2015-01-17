
// Task Div erzeugen und anzeigen
// im Backlog
function displayTask(task){

	// Allgemeines Task Div
	// enthält alle anderen Divs (Titel, Priorität, Typ, Bearbeiten, Löschen)
	// erzeuge neues Div-Element
	var taskDiv = document.createElement("div");

	// setze Attribute für das neue Div-Element
	taskDiv.setAttribute("id", "task_"+task.getTaskId());	// setze Div-ID anhand der Objekteigenschaft
	taskDiv.setAttribute("name", "task"+task.getTaskId);	// setze DIV-Name anhand der Objekteigenschaft
	taskDiv.setAttribute("class", "task");			// setze Div-Klasse für CSS-Formatierung
	taskDiv.setAttribute("draggable", "true");		// mache das DIV draggbar
	taskDiv.setAttribute("ondragstart", "drag(event)");	// setze auszulösende Fkt bei Draggbeginn
	taskDiv.setAttribute("style", "cursor: pointer;");	// ändere Cursor bei Mouseover über das Div



	// Task Title
	// erzeuge neues Div-Element
	var taskTitleDiv = document.createElement("div");

	// setze Attribute für das neue Div-Element
	// für genauere Beschreibung siehe Allgemeines Task Div oben
	taskTitleDiv.setAttribute("id", "taskTitle_"+task.getTaskId());
	taskTitleDiv.setAttribute("name", "taskTitle_"+task.getTaskId);
	taskTitleDiv.setAttribute("class", "taskTitle");

	// Schreibe Titel anhand der Objekteigenschaft in das Div
	taskTitleDiv.innerHTML = task.getTitle();



	// Task Priority
	// erzeuge neues Div-Element
	var taskPriorityDiv = document.createElement("div");

	// setze Attribute für das neue Div-Element
	// für genauere Beschreibung siehe Allgemeines Task Div oben
	taskPriorityDiv.setAttribute("id", "taskPriority_"+task.getTaskId());
	taskPriorityDiv.setAttribute("name", "taskPriority_"+task.getTaskId);
	taskPriorityDiv.setAttribute("class", "taskPriority");

	// Lade Prioritäts-Icon anhand der Objekteigenschaft in das Div
	taskPriorityDiv.innerHTML = "<img src='./images/icons/"+task.getPriority()+".png'>";



	// Task Type
	// erzeuge neues Div-Element
	var taskTypeDiv = document.createElement("div");

	// setze Attribute für das neue Div-Element
	// für genauere Beschreibung siehe Allgemeines Task Div oben
	taskTypeDiv.setAttribute("id", "taskType_"+task.getTaskId());
	taskTypeDiv.setAttribute("name", "taskType_"+task.getTaskId);
	taskTypeDiv.setAttribute("class", "taskType");

	// Lade Aufgabentyp-Icon anhand der Objekteigenschaft in das Div
	taskTypeDiv.innerHTML = "<img src='./images/icons/"+task.getType()+".png'>";



	// Task Edit
	// erzeuge neues Div-Element
	var taskEditDiv = document.createElement("div");

	// setze Attribute für das neue Div-Element
	// für genauere Beschreibung siehe Allgemeines Task Div oben
	taskEditDiv.setAttribute("id", "taskEdit_"+task.getTaskId());
	taskEditDiv.setAttribute("name", "taskEdit_"+task.getTaskId);
	taskEditDiv.setAttribute("class", "taskEdit");

	// Lade Bearbeiten-Icon in das Div und verlinke dieses auf Bearbeitungs-Seite
	// Hänge die Task-ID an die URL an um diese der Bearbeitungs-Fkt mitzuteilen
	taskEditDiv.innerHTML = '<a class="fancybox" href="./taskedit.php?id='+task.getTaskId()+'" title="Aufgabe ansehen/bearbeiten."><img src="./images/icons/edit.png"></a>';



	// Task Delete
	// erzeuge neues Div-Element
	var taskDeleteDiv = document.createElement("div");

	// setze Attribute für das neue Div-Element
	// für genauere Beschreibung siehe Allgemeines Task Div oben
	taskDeleteDiv.setAttribute("id", "taskDelete_"+task.getTaskId());
	taskDeleteDiv.setAttribute("name", "taskDelete_"+task.getTaskId);
	taskDeleteDiv.setAttribute("class", "taskDelete");

	// Lade Löschen-Icon in das Div und verlinke dieses auf Löschen-Seite
	// Hänge die Task-ID an die URL an um diese der Lösch-Fkt mitzuteilen
	taskDeleteDiv.innerHTML = '<a class="fancybox" href="./taskdelete.php?id='+task.getTaskId()+'" title="Aufgabe löschen."><img src="./images/icons/delete.png"></a>';



	// Alle Divs einfügen
	// Lege alle anderen Divs in das Allgemeine Task Div
	taskDiv.appendChild(taskTitleDiv);
	taskDiv.appendChild(taskPriorityDiv);
	taskDiv.appendChild(taskTypeDiv);
	taskDiv.appendChild(taskEditDiv);
	taskDiv.appendChild(taskDeleteDiv);

	// Lege Allgemeines Div in den Backlog, die Aufgabenliste	
	backlog.appendChild(taskDiv);
}
