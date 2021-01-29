<?php
	session_start();
	
	if(!isset($_SESSION['Id_Player']))
	{
			$_SESSION['page']="Gioco.php";
			header('location: ./Gioco.php');
			exit;
	}
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8"> 
		<meta name = "author" content = "author">
		<title>Sokoban</title>
    	<link rel="stylesheet" href="../css/Gioco.css" type="text/css" media="screen">		
		<script src="../javascript/home.js"></script> 		
		<script src="../javascript/sokoban.js"></script> 
  	</head>
	<body>
		
		<div id="menu">
			<a class="close_menu" onclick="closeBar()">&#10005;</a>
			<a href="./Gioco.php">Gioca</a>
			<a href="../php/Classifica.php">Classifica</a>
			<a href="../php/Comandi.php">Comandi</a>
			<a href="../php/Logout.php">Logout</a>
        </div>

		<div id="main_page">
			<span onclick="openBar()">&#9776;</span>
			
			<div id ="newgame">
				<img src="../css/start.jpg" alt="bottoneStart" onclick="start()">
			</div>
			
			<br>
				

			<div id ="livello"></div><div id="tempo"></div><div id="spostamenti"></div> 
			<br>
			

			
			<table id="griglia"> </table>
			<br><br>
			
			
			<button id="resa" type="button" onclick="location.href='../php/Gioco.php'" class="hover" hidden>Re-Start</button>
			
			
			<footer id ="footer">
				Realizzato da 
				<address>
				<a id="mail" href="mailto:sedodome96@gmail.com">Sergio Domenici</a>
				</address>
			</footer>
		</div>
		
  	</body>
</html>