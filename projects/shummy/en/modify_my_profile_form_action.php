<?php
session_start();

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "Shummy";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");

$idUser=$_SESSION['USER_ID'];


$First_Name = $_POST['First_Name'];
$Last_Name=$POST['Last_Name'];
$Email=$_POST['Email'];
$Description=$_POST['Description'];
$User_Address=$_POST['Address'];
$Phone_Number=$_POST['Phone_Number'];
$Facebook_Account=$_POST['Facebook'];
$User_Photo="{$row['User_Photo']}";

if(!empty($First_Name)) {
    mysql_query("UPDATE user SET `First_Name`='$First_Name' WHERE User_Id='$idUser'") or die(mysql_error());
}
if(!empty($Last_Name)) {
    mysql_query("UPDATE user SET `Last_Name`='$Last_Name' WHERE User_Id='$idUser'") or die(mysql_error());
}
if(!empty($Email)) {
    mysql_query("UPDATE user SET `Email`='$Email' WHERE User_Id='$idUser'") or die(mysql_error());
}
if(!empty($Description)) {
    mysql_query("UPDATE user SET `User_Description`='$Description' WHERE User_Id='$idUser'") or die(mysql_error());
}
if(!empty($User_Address)) {
    mysql_query("UPDATE user SET `User_Address`='$User_Address' WHERE User_Id='$idUser'") or die(mysql_error());
}
if(!empty($Phone_Number)) {
    mysql_query("UPDATE user SET `Phone_Number`='$Phone_Number' WHERE User_Id='$idUser'") or die(mysql_error());
}
if(!empty($Facebook_Account)) {
    mysql_query("UPDATE user SET `Facebook_Account`='$Facebook_Account' WHERE User_Id='$idUser'") or die(mysql_error());
}
if(!empty($User_Photo)) {
    mysql_query("UPDATE user SET `User_Photo`='$User_Photo' WHERE User_Id='$idUser'") or die(mysql_error());
}

   mysql_close(); 

?>