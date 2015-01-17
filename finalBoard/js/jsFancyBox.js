
// Konfiguration der FancyBox
// Generiere FancyBox nachdem alle Inhalte geladen sind, Seite bereit ist
$(document).ready(function() {

	$(".fancybox").fancybox({

		type: 'iframe',				// setze Typ iframe um HTML-Seiten anzeigen zu können
		autoSize : false,			// deaktiviere automatische Größenanpassung
		width: 680,				// setze Breite fix auf 680px
		titlePosition: 'over',			// lege Titel-Position fest
		arrows: false,				// deaktiviere Weiter- und Zurück-Buttons, die normal
							// zur Navigation innerhalb Bildergalerien genutzt werden

		afterClose: function() {		// setze Fkt, die mit Schließen der Box ausgeführt wird	
			window.location.reload();	// Fkt: lade das (Haupt-)Fenster neu
		}					// Grund: Änderungen werden somit nach Schließen direkt
	});						// auf dem Board angezeigt ohne	manuelles Neuladen				
});