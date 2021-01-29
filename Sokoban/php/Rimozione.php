<?php
	
	$mysqli= new mysqli("localhost", "root", "", "progsergio");
	
	if ($mysqli->connect_error) {
	die('Errore di connesione (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}
	
	$id = $_POST['numero'];

	$ErrorMessage = null;

	if($_POST['submit']){
		$query1 = "DELETE FROM Game
					WHERE Id_player = '$id'";
		
		$result1 = $mysqli->query($query1);
				
				
		if($id != 6) {
			
			$query = "DELETE FROM Player
						WHERE Id_Player = '$id'";
						
			
				
			$result = $mysqli->query($query);
		}
		

	}

			header('location: ./AdminInput.php');		

?>