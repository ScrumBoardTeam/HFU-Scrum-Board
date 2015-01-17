<!-- Das Hauptmenu ist fix -->
<!-- Es beinhaltet: Task erstellen, Chart aufrufen, Sprint erstellen, Backlog aufrufen -->
<!-- Alle Links werden via class="fancybox" in der FancyBox geöffnet -->

<ul id="menu">

<li><a class="fancybox"	href="./taskcreation.php" 			title="Neue Aufgabe">		<img src="./images/menu_but/mb_newTask.png">	</a></li>
<li><a class="fancybox" href="./chart.php?id=<?php echo $_GET['id'] ?>" title="Burn-down Chart">	<img src="./images/menu_but/mb_chart.png">	</a></li>
<li><a class="fancybox" href="./sprintcreation.php" 			title="Neuer Sprint">		<img src="./images/menu_but/mb_newSprint.png">	</a></li>
<li><a class="fancybox" href="./backlog.php" 				title="Product Backlog">	<img src="./images/menu_but/mb_backlog.png">	</a></li>

</ul>