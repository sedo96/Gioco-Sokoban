<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "it">
	<head>
		<meta charset = "utf-8">
		<title>Sokoban</title>
		<link rel = "stylesheet" href= "../css/Comandi.css" type = "text/css" media = "screen">
		<script src = "../javascript/home.js"></script>
	</head>
	<body>
		<div id = "menu">
			<a class = "close_menu" onclick = "closeBar()">&#10005;</a>
			<a href="../php/Gioco.php">Gioca</a>
			<a href="../php/Classifica.php">Classifica</a>
			<a href="../php/Comandi.php">Comandi</a>
			<a href="../php/Logout.php">Logout</a>
							
						
        </div>
		
		<div id = "main_page">
			<span onclick ="openBar()">&#9776;</span>
			
			<h1>Comandi</h1>
			
		
		
			<p>Il gioco è composto da 5 livelli. L'obiettivo è superarli tutti e cercare di farlo nel minor tempo e nel minor numero di spostamenti possibile.</p>
			
			
			<div class="tasti">
				<img class="imgtasti" src="../css/tastiera.jpg" alt="testo alternativo">Per muovere il protagonista e spostare le casse.
			</div>
			
		</div>
		
			
		<footer id ="footer">
			
			Realizzato da 
			<address>
			<a id="mail" href="mailto:sedodome96@gmail.com">Sergio Domenici</a>
			</address>
		</footer>
			
		
  	</body>
</html>