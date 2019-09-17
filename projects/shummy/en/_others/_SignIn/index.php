<?php
	include('login.php'); // Includes Login Script

	if(isset($_SESSION['login_user'])) {
		header("location: profile.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Shummy - Login</title>
	<!-- IMPORT ICON -->
	<link rel="icon" type="image/png" href="data/logo_shummy.ico" />
	<link rel="icon" sizes="192x192" href="data/logo_shummy.ico" />
	<!-- IMPORT CSS -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oxygen" />
	<link rel="stylesheet" href="../styles/css/css_web.css" />
	<link rel="stylesheet" href="../styles/css/css_mobile.css" />
	<link rel="stylesheet" href="login.css" />
	<link rel="stylesheet" href="login_mobile.css" />
</head>
<body>
	<img class="bg_img" src="../data/bg/bg_login_1.jpg" />
	<div id="login">
		<form action="" method="post">
			<table>
				<tr><td><a href="../"><img src="logo_web_shummy_light.png" /></a></td></tr>
				<tr><td><input id="Email" name="Email" placeholder="Email" type="text"></td></tr>
				<tr><td><input id="Password" name="Password" placeholder="**********" type="password"></td></tr>
				<tr><td><a href="">I forgot my password</a></td></tr>
				<tr><td><button id="submit" name="submit">LOG IN</button></td></tr>
			</table>
			
			<span><?php echo $error; ?></span>
		</form>
	</div>
	
	<?php //include("../section/_footer.php"); ?>
	<!-- IMPORT JS -->
	<script src="./styles/js/jquery-1.11.3.min.js"></script>
	<script src="./styles/js/index.js"></script>
	<script src="./styles/js/home.js"></script>
</body>
</html>