<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8"> 
		<meta name = "author" content = "author">
		<title>Sokoban</title>		
    	<link rel="stylesheet" href="../css/Classifica.css" type="text/css" media="screen">		
		<script src="../javascript/home.js"></script> 		
  	</head>
	<body>
		
		<div id="menu">
			<a class="close_menu" onclick="closeBar()">&#10005;</a>		
			<a href="./Gioco.php">Gioca</a>
			<a href="./Classifica.php">Classifica</a>
			<a href="./Comandi.php">Comandi</a>
			<a href="./Logout.php">Logout</a>
		
        </div>

		<div id="main_page">
			<span onclick="openBar()">&#9776;</span>
			
			<h1>Classifica generale</h1>
		
			
			<?php		  
				$mysqli= new mysqli("localhost", "root", "", "progsergio");
				if ($mysqli->connect_error) {
				die('Errore di connesione (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
				}

				$query = "SELECT Id_Game, Tempo, Username, Spostamenti AS Spostamenti
						  FROM Game RIGHT OUTER JOIN Player ON Player.Id_Player = Game.Id_Player
						  WHERE Player.Id_Player != 6
						  ORDER BY (Spostamenti + Tempo)
						  LIMIT 12
						  "; 

				$result = $mysqli->query($query);
				
				if ($result->num_rows != 0) 
				{
					echo"<br>";	
					echo"<br>";
					echo"<table>";
					echo"<tr>";
					echo"<th>Posizione</th>";
					echo"<th>Username</th>";
					echo"<th>Mosse</th>";
					echo"<th>Tempo</th>";
					
					echo"</tr>";
					
					for($i = 1; $row = $result->fetch_assoc(); $i++)
					{
						echo"<tr>";
						echo"<td>$i&deg;</td>";
						echo"<td>$row[Username]</td>";
						echo"<td>$row[Spostamenti]</td>";
						echo"<td>$row[Tempo]</td>";
						echo"</tr>";
					}
					
					echo"</table>";
					echo"<br><br>";
					echo"";
				}
				
				else
				{
					$message  = 'Query non valida: ' . $mysqli->error . 'Whole query: ' . $query . "\n" ;
					die($message);
				}

				$result->close();
				$mysqli->close();	
			?>
					
	
				
			<footer id ="footer">
				Realizzato da 
				<address>
				<a id="mail" href="mailto:sedodome96@gmail.com">Sergio Domenici</a>
				</address>
			</footer>
		</div>
		
  	</body>
</html>