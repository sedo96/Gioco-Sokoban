<?php
	session_start();
   
    if(isset($_SESSION['Id_Player'])){
		    header('Location: ./index.php');
		    exit;
    }	
?>
<!DOCTYPE html>
<html lang = "it">
	<head>
		<meta charset = "utf-8">
		<title>Sokoban</title>
		<link rel = "stylesheet" href= "./css/progetto.css" type = "text/css" media = "screen">
		<script src = "./javascript/home.js"></script>
	</head>
	<body>
		
		<div id = "menu">
			<a class = "close_menu" onclick = "closeBar()">&#10005;</a>
			<a href="./index.php">Login</a>
			<a href="./php/Storia.php">Info</a>
			<a href="./php/Struttura.php">Struttura</a>

							
						
        </div>
		
		<div id = "main_page">
			<span onclick ="openBar()">&#9776;</span>
			
			<h1>Sokoban</h1>
			
			<form action="./php/Login.php" method="post">
				<div class="imglogin">
				<img src="./css/sokobanLogin.jpg" alt="Avatar" class="avatar">
				</div>

				<div class="container">
					<label>username</label>
						<input type="text" name="username" class="testo" placeholder="Enter username" /><br>
						<label>password</label>
						<input type="password" name="password" class="testo" placeholder="Enter password"/><br>	
						<?php
							if (isset($_GET['ErrorMessage'])){
								echo '<p id="errore">' . $_GET['ErrorMessage'] . '</p>';
							}
				?>
					<button type="submit">Enter</button>
					
					
				
				</div>
				
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