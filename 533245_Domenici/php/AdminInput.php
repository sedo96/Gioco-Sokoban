<?php
	session_start();
	if(!isset($_SESSION['Id_Player']))
	{
			$_SESSION['page']="AdminInput.php";
			header('location: ./AdminInput.php');
			exit;
	}	
?>
<!DOCTYPE html>
<html lang = "it">
	<head>
		<meta charset = "utf-8">
		<title>Sokoban</title>
		<link rel = "stylesheet" href= "../css/Admin.css" type = "text/css" media = "screen">
		<script src = "../javascript/home.js"></script>
	</head>
	<body>
		
		<div id = "menu">
			<a class = "close_menu" onclick = "closeBar()">&#10005;</a>
			<a href="../php/Logout.php">Logout</a>
		</div>
		
		<div id = "main_page">
			<span onclick ="openBar()">&#9776;</span>
			<br><br><br><br><br><br>
			
			<form method="post" action="NuovoUtente.php">
				 <button type="submit">Nuovo Utente</button>
			</form>
			
			<form method="post" action="RimozioneUtente.php">
				 <button type="submit">Rimozione Utente</button>
			</form>

			<footer id ="footer">
				Realizzato da 
				<address>
				<a id="mail" href="mailto:sedodome96@gmail.com">Sergio Domenici</a>
				</address>
			</footer>
		</div>	
		
  	</body>
</html>