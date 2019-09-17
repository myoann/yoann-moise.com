<?php
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	$connection = mysql_connect("localhost", "root", "");
	// Selecting Database
	$db = mysql_select_db("Shummy", $connection);
	session_start();// Starting Session
	// Storing Session
	$user_check=$_SESSION['login_user'];
	// SQL Query To Fetch Complete Information Of User
	$ses_sql=mysql_query("select * from USER where Email='$user_check'", $connection);
	$row = mysql_fetch_assoc($ses_sql);
	$first_name_session =$row['First_Name'];
	if(!isset($first_name_session)) {
		mysql_close($connection); // Closing Connection
		header('Location: index.php'); // Redirecting To Home Page
	}
	$user_id_session =$row['User_Id'];
	if(!isset($user_id_session)) {
		mysql_close($connection); // Closing Connection
		header('Location: index.php'); // Redirecting To Home Page
	}
?>