<?php include("./php/_checkLogin.php"); ?>
<!-- 
==============================
		IMPORT HEADER 
==============================
-->
<?php include("./section/_header.php"); ?>

<!-- 
==============================
		CONTENT
==============================
-->
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

$sql = "SELECT * FROM user WHERE User_Id='$idUser'";

$retval = mysql_query( $sql, $bd );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
	$First_Name="{$row['First_Name']}";
	$Last_Name="{$row['Last_Name']}";
	$Email="{$row['Email']}";
	$Description="{$row['User_Description']}";
	$User_Address="{$row['User_Address']}";
	$Phone_Number="{$row['Phone_Number']}";
	$Facebook_Account="{$row['Facebook_Account']}";
  	$User_Photo="{$row['User_Photo']}";
} 
mysql_close($bd);
?>

<div id="viewMeal" class="viewCooker">
	<div class='card_meal'>
		<a id="bt_modify_account" href="modify_my_profile.php">Modify</a>
		<span  class="name"> <?= $First_Name ?> <?= $Last_Name ?></span><span class="age">19 y. o.</span>
		<img class='card_img card_bg_img' src='http://bloote.com/wp-content/uploads/2015/06/Abstract-3D-Colorful.jpg'>
		<img class="imgCooker" src="<?= $User_Photo ?>" />
	</div>
	<div class="card_info card_stars">
		<span class="icon-star-3"></span>
		<span class="icon-star-3"></span>
		<span class="icon-star-3"></span>
		<span class="icon-star-3"></span>
		<span class="icon-star-3"></span>
	</div>	
	<div class="card_info card_cookInfos">
		<table>
			<tr><td><span id="cook_des" class="cook_info icon-bubble">  <?= $Description ?></span></td></tr>
			<tr>
				<td><span id="cook_phone" class="cook_info icon-phone"> <a href="tel:<?= $Phone_Number ?>"><?= $Phone_Number ?></a></span></td>
			</tr>
			<tr>
				<td><span id="cook_email" class="cook_info icon-mail-2"> <a href="mailto:<?= $Email ?>"><?= $Email ?></span></td>
			</tr>
			<tr>
				<td><span id="cook_adress" class="cook_info icon-location"> <?= $User_Address ?></span></td>
			</tr>
			<tr>
				<td>
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5769.016373935506!2d7.279778928155813!3d43.69998704608846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1436536085355" frameborder="0" style="border:0" allowfullscreen></iframe>
				</td>
			</tr>
		</table>
		<div class="card_info card_social">
			<a href="<?= $Facebook_Account ?>" id="fb_link"><span class="icon-facebook"></span></a>
			<span class="icon-twitter"></span>
			<span class="icon-linkedin"></span>
		</div>	
		<table>
			<tr>
				<td>
					<a id="bt_delete_account" href="deleteUser.php">Delete your account ?</a>
				</td>
			</tr>
		</table>
	</div>	
</div>

<!-- 
==============================
		IMPORT FOOTER 
==============================
-->
<?php include("./section/_footer.php"); ?>