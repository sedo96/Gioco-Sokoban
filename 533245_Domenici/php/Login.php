<?php
	
	$mysqli= new mysqli("localhost", "root", "", "progsergio");
	
	if ($mysqli->connect_error) {
	die('Errore di connesione (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	
	
	$username = $mysqli->real_escape_string($username);
	$password = $mysqli->real_escape_string($password);

	
	$ErrorMessage = null;

	if ($username != null && $password != null)
	{
		$query = "SELECT * 
			  FROM Player
			  WHERE Username='" . $username . "' AND Password='" . $password . "'";
		
		
		$result = $mysqli->query($query);
		
	
		if(mysqli_num_rows($result) != 1)
			$ErrorMessage = 'Username e password non validi';
		else
    	{
			$row = $result->fetch_assoc();
			$Id_giocatore = $row['Id_Player'];
			session_start();
			$_SESSION['Id_Player'] = $Id_giocatore;
		}
    } 
	
	else
		$ErrorMessage = 'Inserisci username e password';
	

	$admin = $row['Adm'];

	/*$result->close();
	$mysqli->close();*/
	
		
	if($ErrorMessage === null)
	{
		if(isset($_SESSION['page']))
		{
			header('location: ./' . $_SESSION['page']);
			$_SESSION['page']=null;
		}
		else if ($admin == 0)
			header('location: ./Gioco.php');
		else if ($admin == 1)
			header('location: ./AdminInput.php');
		
		
			
	}
		
	else
		header('location: ../index.php?ErrorMessage=' . $ErrorMessage );
?>