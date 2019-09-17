<?php
session_start();
include('connection.php');
$fname=$_POST['First_Name'];
$lname=$_POST['Last_Name'];
$email=$_POST['Email'];
$password=$_POST['Password'];
mysql_query("INSERT INTO USER(First_Name, Last_Name, Email, Password)VALUES('$fname', '$lname', '$email', '$password')");
header("location: index.php?remarks=success");
mysql_close($con);
?>