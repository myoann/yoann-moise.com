<?php
	session_start();

	if (isset($_SESSION["USER_ID"]) && isset($_SESSION["EMAIL"])){
		$USER_ID=$_SESSION['USER_ID'];
		$EMAIL=$_SESSION['EMAIL'];
		//header("location: home.php");
	}else{
		// on redirige l'utilisateur vers la page de connexion
		header("location: login.php");
	}
?>