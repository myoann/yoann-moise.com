<?php
	include("./DB.php");
	/*
		addNewUser($dbh,"ok85","ok","ok","ok");
		echo "ok";
	*/
	$sql = 'SELECT Address FROM meal';
	$stmt =  connexion()->prepare($sql);
	$stmt->bindParam(':user_id',$user_id);

	$stmt->setFetchMode(PDO::FETCH_OBJ);

	//Compiler et exécuter la requête
	$stmt->execute();

	//Récupérer toutes les données retournées
	$resultJSON=$stmt->fetchAll(PDO::FETCH_ASSOC);

	$JSON_address=json_encode($resultJSON);
?>