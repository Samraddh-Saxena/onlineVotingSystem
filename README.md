VOTING MANAGEMENT SYSTEM :
----------------------------------------------------------------------------------
----------------
1: INTRODUCTION
----------------
FOLLOWING READ ME FILE CONTAINS INSTRUCTION TO SET UP AND EXECUTE OUR PROGRAM:

2: INSTALLATION & EXECUTION
----------------------------

Step 1: Disabling MySQL server at start-up:
While running XAMPP, there is a possiblity of an issue coming in regards to the port already being used by MySQL which runs automatically. If the system already has MySQL installed then proceed with the following steps:
- In the search tab search for SERVICES, open SERVICES.
- Search for the service by the name of MYSQL80, click on MYSQL80.
- In the adjacent tab, click stop service.
- Right-Click on XAMPP and click properties, under properties set start-up type as manual.
- You are done with this step, we have a video going over the alternate trouble-shooting required to solve that error.

Step 2: Installation of XAMPP:
XAMPP is a free and open-source cross-platform web server solution stack package which we will be using to host our project on a local server, proceed with the following steps for installation:
- Click on following link and download the appropriate installer to download the installation file for XAMPP:- https://www.apachefriends.org/download.html
- Run the installation file and install XAMPP, we have attached a link to a tutorial for further help if needed:- https://www.youtube.com/watch?v=at19OmH2Bg4&list=PLu0W_9lII9aikXkRE0WxDt1vozo3hnmtR

Step 3: Opening and Setting up XAMPP and myPhpAdmin:
- Copy the 'vms' folder into the htdocs folder present in the XAMPP folder. XAMPP folder is usually present in C drive itself, unless changed during installation.
- Open the XAMPP Control Panel.
- Push the start button for Apache and MYSQL.
- After both have succesfuly run, click on ADMIN button next to MYSQL, this will pop up a webpage in your browser, we are done with setting up XAMPP.
- On the left panel, below phpMyAdmin logo press new.
- set database name as 'votingms' (this is case-sensitive) and hit create.
- click on import from the top panel, and in the pop-up select the sql file(votingms.sql inside database_import folder) we have provided to load in the database.

Step 4: Changing Code to set up password:
- Open the XAMPP folder then open the htdocs folder open the vms folder.
- In the vms folder, open admin folder, then open include, finally open the config file.
- contents of the config file are:
	<?php
	$db=mysqli_connect("localhost","root","","votingms") or die("Could Not Connect");
	?>
- here edit the contents as to replace the first root with the username for your mySQL local server, for ex:
	<?php
	$db=mysqli_connect("localhost","username","","votingms") or die("Could Not Connect");
	?>
- save this file.
Step 5: Navigating and Opening the required file.
- Open any browser and open the following URL: http://localhost/vms/
- The admin credentials are: UserName = Admin, Password = Admin.

----------------------------------------------------------------------------------
