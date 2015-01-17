
// Sprintlist
// Sprintmenu dynamisch generieren und am linken Boardrand anzeigen
function displaySprintlist(){

	// AJAX-Get an an dbsGetSprints.php
	// ermittelt alle Sprint-Einträge aus der Datenbank
	$.ajax({
		type: "GET",
		url: "./dbs/dbsGetSprints.php",
		success: function(result) {

			// myResult ist 2-Dimensionales Array, wie Tabelle
			// enthält Abfrage-Ergebnis
			var myResult = JSON.parse(result);

			// erzeuge neue Liste
			var myUl = document.createElement("ul");

			// setze Attribute der neuen Liste
			myUl.setAttribute("id", "sprintlist");

			// schreibe Listen-Element für jeden Sprint in die Liste
			// verlinke Listen-Elemente
			// hänge Sprint-ID als Parameter an die URL, damit für die Fkt ersichtlich welcher Sprint geladen werden muss
			// zeige Sprintstart und Sprintende im Link-Titel an (Anzeige bei Mouseover)
			for(var i = 1; i <= myResult.length; i++){

				// prüfe ob Sprint ausgewähltem Sprint entspricht
				// wenn ja, erzeuge Listen-Element mit speziellen CSS-Eigenschaften (höher, dunkelgrüner Hintergrund)
				if(i == document.getElementById('inSprint').value){
					myUl.innerHTML += '<li><a title="Sprint '+i+': '+myResult[i-1]['startdate'].split("-").reverse().join(".")+' bis '+myResult[i-1]['enddate'].split("-").reverse().join(".")+'" style="height: 100px; line-height: 100px; vertical-align: middle; background: #008854" href="./index.php?id='+i+'">S'+i+'</a></li>';
				}
				// wenn nein, erzeuge Standard-Listen-Element
				else{
					myUl.innerHTML += '<li><a title="Sprint '+i+': '+myResult[i-1]['startdate'].split("-").reverse().join(".")+' bis '+myResult[i-1]['enddate'].split("-").reverse().join(".")+'" href="./index.php?id='+i+'">S'+i+'</a></li>';
				}
			}

			// lege neue Sprintliste in entsprechendes Div am linken Boardrand
			sprintlist.appendChild(myUl);
		}
	});
}
