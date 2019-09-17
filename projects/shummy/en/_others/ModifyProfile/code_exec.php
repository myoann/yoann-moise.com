<?php
	session_start();
	$email_session=$_SESSION['login_user'];
	include('connection.php');
	$connection = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("Shummy", $connection);
	$ses_sql=mysql_query("select * from USER where Email='$email_session'", $connection);
	$row = mysql_fetch_assoc($ses_sql);
	$user_id_session =$row['User_Id'];

	$user_id=$user_id_session;
	$title=$_POST['Title'];
	$description=$_POST['Description'];
	$price=$_POST['Price'];
	mysql_query("INSERT INTO NEW_MEAL(User_Id, Title, Description, Price)VALUES('$user_id', '$title', '$description', '$price')");
	header("location: index.php?remarks=success");
	mysql_close($con); 
?>