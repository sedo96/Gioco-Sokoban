<?php
	session_start();
	if(!isset($_SESSION['Id_Player']))
	{
			$_SESSION['page']="Admin.php";
			header('location: ./Admin.php');
			exit;
	}	
?>
<!DOCTYPE html>
<html lang = "it">
	<head>
		<meta charset = "utf-8">
		<title>Sokoban</title>
		<link rel = "stylesheet" href= "../css/AdminRim.css" type = "text/css" media = "screen">
		<script src = "../javascript/home.js"></script>
	</head>
	<body>
		
		<div id = "menu">
			<a class = "close_menu" onclick = "closeBar()">&#10005;</a>
			<a href="../php/AdminInput.php">Opzioni Admin</a>
			<a href="../php/Logout.php">Logout</a>

							
						
        </div>
		
		<div id = "main_page">
			<span onclick ="openBar()">&#9776;</span>
			
			<h1>Rimozione utente</h1>
					  
						<form method="post" action="Rimozione.php">
						  <p id = "id_player">ID_Player
							<input type="number" name="numero" min="1" max="100000">
						  </p>
						
				
				<?php
						if (isset($_GET['ErrorMessage'])){
								echo '<p id="errore">' . $_GET['ErrorMessage'] . '</p>';
						}
				?>
				
							<input type="submit" value = "Rimuovi" name = "submit">
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