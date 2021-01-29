<?php	
	session_start();

	$mysqli= new mysqli("localhost", "root", "", "ProgSergio");
	
	if ($mysqli->connect_error) {
	die('Errore di connesione (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}

	$id_giocatore = $_SESSION['Id_Player'];

	$count_mosse = $_GET['count'];
	$game_time = $_GET['time'];

	$query = "INSERT INTO Game (Id_Game, Spostamenti, Tempo, Id_Player)
				VALUES('','$count_mosse', '$game_time', '$id_giocatore ')"; 

	$result = $mysqli->query($query);
	
	if (!$result) 
	{
		$message  = 'Query non valida: ' . $mysqli->error . 'Whole query: ' . $query . "\n" ;
		die($message);
	}
	$mysqli->close();	
?>