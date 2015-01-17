
*************************************************************************************
*************************************************************************************

Scrum-Board für IT-Studis - Hochschule Furtwangen

Projectmembers:  Fares Ibrahim, Joel Wochele, Serya Buturak, Steven Pfündlin
Projectadvisors: Dr. Saed Imran, Prof. Dr.-Ing. Ulf Schreier

*************************************************************************************
*************************************************************************************

[[[ Installation ]]]

If you have your own webspace, go with option 1. The board can be stored global and
all projectmembers can work together on the board. If you haven't a webspace, you can
use XAMPP to setup a local server. Be sure that this won't be global so the project
team only can work at the one computer with the local XAMPP server. This option is
only recommended for further development of the plattform or demonstration purpose.

*************************************************************************************

Option 1: Installation using own webspace

1 - Download and unzip the 'scrumBoardFuerStudis.zip' archive.

2 - Upload the complete folder 'scrumBoard' to your webspace.

3 - Create a MySQL-database on the same server called 'scrumboard'.
    You can use: CREATE DATABASE scrumboard;

4 - Choose the new database.
    You can use: USE scrumboard;

5 - Create a table called sb_sprints. Please use the following command:

    CREATE TABLE sb_sprints(
	ID int AUTO_INCREMENT PRIMARY KEY,
	startdate date,
	enddate date
    );

6 - Create a table called sb_tasks. Please use the following command:

    CREATE TABLE sb_tasks(
	ID int AUTO_INCREMENT PRIMARY KEY,
	title varchar(30),
	description varchar(400),
	type varchar(30),
	priority varchar(10),
	editor varchar(30),
	worktime int,
	endtime date,
	col int,
	sprint int
    );

7 - Go to 'http://yourAdress/yourPath/scrumBoard/' to open up the plattform.

*************************************************************************************

Option 2: Installation using XAMPP

1 - Download XAMPP from 'http://www.apachefriends.org/'.

2 - Install XAMPP on your computer.

3 - Download and unzip the 'scrumBoardFuerStudis.zip' archive.

4 - Copy the complete folder 'scrumBoard' into the folder 'htdocs' of your XAMPP
    installation. Normally found at 'C:\Program Files\xampp\htdocs'.

5 - Open XAMPP Control Panel. Start the Apache-Module and the MySQL-Module.

6 - Click 'Admin' next to the MySQL-Start-Button.

7 - In phpMyAdmin click 'SQL' at the top-menu and type in: CREATE DATABASE scrumboard;

8 - If creation was succesfully you see the new database at the left-menu. Choose it.

9 - Click 'SQL' at the top-menu and type in: CREATE TABLE sb_sprints(
						ID int AUTO_INCREMENT PRIMARY KEY,
						startdate date,
						enddate date
    					     );

					     CREATE TABLE sb_tasks(
						ID int AUTO_INCREMENT PRIMARY KEY,
						title varchar(30),
						description varchar(400),
						type varchar(30),
						priority varchar(10),
						editor varchar(30),
						worktime int,
						endtime date,
						col int,
						sprint int
    					     );

10 - If creation was succesfully you see the two new tables at the left-menu.

11 - Go to 'http://localhost/scrumBoard/' to open up the plattform.


*************************************************************************************
*************************************************************************************

[[[ How to use ]]]

1 - Global menu is found at the top-right corner.

2 - To create a new sprint click 3rd button 'Neuer Sprint'. Put in a startdate and a
    enddate for the new sprint. Press 'Erstellen'.

3 - To create a new task click 1st button 'Neue Aufgabe'. Put in the attributes for
    the new task. Press 'Erstellen'.

4 - Click the 4th button to open up the product backlog. Choose a sprint from the
    dropdown-menu at the right. Then drag & drop a task from the left to the droparea
    below the dropdown-menu. The task is now assigned to the sprint.

5 - Go back to the board. Select your sprint from the sprint-menu left to the board.

6 - The task should be displayed in the column 'Ausstehend'. If you start working on
    it, drag & drop it to the next column.

7 - To show the Burn-down Chart, click the 2nd button from the global menu. Make sure
    to select a sprint with some assigned tasks before.

*************************************************************************************
*************************************************************************************
