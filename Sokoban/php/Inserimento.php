<?php
	
	$mysqli= new mysqli("localhost", "root", "", "progsergio");
	
	if ($mysqli->connect_error) {
	die('Errore di connesione (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}
	
	$username = $_POST['name'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	$ErrorMessage = null;

		

	if($_POST['submit']){
		if ($username != null && $password != null && $email != password) {
		$query = "INSERT INTO Player
					VALUES (' ', '$username', '$email', '$password', 0)";
				  
			
		$result = $mysqli->query($query);
		} else if (empty($username) || empty($password) || $email == NULL)
			$ErrorMessage = "Compila tutti i campi";
		
	}
		
	if($ErrorMessage === null)
	{
		if(isset($_SESSION['page']))
		{
			header('location: ./' . $_SESSION['page']);
			$_SESSION['page']=null;
		}
		else
			header('location: ./AdminInput.php');		
	}
		
	else
		header('location: ./NuovoUtente.php?ErrorMessage=' . $ErrorMessage );
?>