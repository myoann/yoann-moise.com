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

$sql = "SELECT * FROM NEW_MEAL";

$retval = mysql_query( $sql, $bd );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{ 
    echo "Title :{$row['Title']}  <br> ".
         "Price : $ {$row['Price']} <br> ".
         "Picture : <img src="."{$row['Meal_Photo']}"." /> <br> " .
         "<a href="."{$row['Meal_Link']}".">Go to Meal's Page</a>  <br><br/><br/><br/> "
         ;
}
mysql_close($bd);
?>