
// Task Konstruktor
// erstellt Task-Objekte zur weiteren Verarbeitung
function Task(){

	// Eigenschaften
	var taskId = 0;		// Task-ID (Zahl)
	var title = "";		// Titel (Text)
	var description = "";	// Beschreibung (Text)
	var type = "";		// Aufgabentyp (als Text)
	var priority = "";	// Priorität (als Text)
	var editor = "";	// Bearbeiter (Name, als Text)
	var time = "";		// Aufwand in Personenstunden (Zahl)



	// Get Funktionen
	this.getTaskId = function(){
		return taskId;
	};
	this.getTitle = function(){
		return title;
	};
	this.getDescription = function(){
		return description;
	};
	this.getType = function(){
		return type;
	};
	this.getPriority = function(){
		return priority;
	};
	this.getEditor = function(){
		return editor;
	};
	this.getTime = function(){
		return time;
	};



	// Set Funktionen
	this.setTaskId = function(newTaskId){
		taskId = newTaskId;
	};
	this.setTitle = function(newTitle){
		title = newTitle;
	};
	this.setDescription = function(newDescription){
		description = newDescription;
	};
	this.setType = function(newType){
		type = newType;
	};
	this.setPriority = function(newPriority){
		priority = newPriority;
	};
	this.setEditor = function(newEditor){
		editor = newEditor;
	};
	this.setTime = function(newTime){
		time = newTime;
	};
}
