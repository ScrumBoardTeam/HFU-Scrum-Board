<!DOCTYPE html>

<html>
	
<head>

	<title>Sprint Burn-down Chart</title>

	<!-- Einbinden der Stylesheets -->
	<link rel="stylesheet" type="text/css" href="./template/template.css">

</head>

<body>

	<div id="content">

		<table width="580">
		  <tr>
		    <td valign="bottom" style="padding-bottom: 50px">

			<!-- Beschriftung der Y-Achse -->
			<img src="./images/yLabel.png" alt="Arbeitsaufwand (in Personenstunden)">

		    </td>
		    <td>

			<!-- Einbindung des Chart-Scripts, erzeugt Ausgabe inklusive Chart -->
			<?php include("./dbs/dbsChart.php"); ?>

		    </td>
		  </tr>
		  <tr>
		    <td>
		    </td>
		    <td align="center">

			<!-- Beschriftung der X-Achse -->
			Fortschritt (in Tagen)

		    </td>
		  </tr>
		</table>

	</div>

</body>

</html>