<?php
session_start();

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "Shummy";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");

$email_session=$_SESSION['login_user'];

$sql = "SELECT * FROM USER WHERE Email='$email_session'";

$retval = mysql_query( $sql, $bd );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo "First Name :{$row['First_Name']}  <br> ".
         "Last Name : {$row['Last_Name']} <br> ".
         "Email : {$row['Email']} <br> ".
         "Description : {$row['User_Description']} <br> ".
         "Email : {$row['Email']} <br> ".
         "Postal Address : {$row['User_Address']} <br> ".
         "Phone Number : {$row['Phone_Number']} <br> ".
         "Facebook : <a target=_blank href='{$row['Facebook_Account']}'>Link to Facebook Account</a> <br> "
         ;
} 
mysql_close($bd);
?>