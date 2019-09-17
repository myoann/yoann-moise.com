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
  echo '<form name="reg" action="code_exec.php" onsubmit="return validateForm()" method="post">
  <table width="274" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="2">
  		<div align="center">
  		  <?php 
  		$remarks=$_GET["remarks"];
  		if ($remarks==null and $remarks=="")
  		{
  		echo "Register Here";
  		}
  		if ($remarks=="success")
  		{
  		echo "Registration Success";
  		}
  		?>	
  	    </div></td>
    </tr>
    <tr>
      <td><div align="right">First Name:</div></td>
      <td><input type="text" name="First_Name" value="'."{$row["First_Name"]}".'"> </input></td>
    </tr>
   <tr>
      <td><div align="right">Last Name:</div></td>
      <td><input type="text" name="Last_Name" value="'."{$row["Last_Name"]}".'"></td>
    </tr>
   <tr>
      <td><div align="right">Email:</div></td>
      <td><input type="text" name="Email" value="'."{$row["Email"]}".'"></td>
    </tr>
    <tr>
      <td><div align="right">Description:</div></td>
      <td><input type="text" name="Description" value="'."{$row["User_Description"]}".'"></td>
    </tr>
    <tr>
      <td><div align="right">Postal Address:</div></td>
      <td><input type="text" name="Address" value="'."{$row["User_Address"]}".'"></td>
    </tr>
    <tr>
      <td><div align="right">Phone Number:</div></td>
      <td><input type="text" name="Phone_Number" value="'."{$row["Phone_Number"]}".'" ></td>
    </tr>
    <tr>
      <td><div align="right">Facebook:</div></td>
      <td><input type="text" name="Facebook" value="'."{$row["Facebook_Account"]}".'"></td>
    </tr>
    <tr>
      <td><div align="right"></div></td>
      <td><input name="submit" type="submit" value="Submit" /></td>
    </tr>
  </table>
  </form>';
} 
mysql_close($bd);
?>