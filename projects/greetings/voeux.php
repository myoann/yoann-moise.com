<?php
	/* ----- paramsDEFAULT ----- */
	$tabTHEME=array("2014","anniv","noel");
	$theme="hny";
	$leName="Ami internaute ;)";

	/* ----- paramsURL ----- */
	// - $theme
	if (isset($_GET["evt"])){
		$event=trim($_GET["evt"]);
		$event=strtolower($event);
		if (in_array($event, $tabTHEME)){
			$theme=$event;
		}
	}
	$file="./data/theme/$theme.php";
	if (file_exists($file)){
		include($file);
	}
	// - $leName
	if (isset($_GET["name"])){
		$name=trim($_GET["name"]);
		if (!empty($name)){
			$leName=$name;
		}
	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Carte de voeux</title>

	<link rel="stylesheet" href="./styles/css/carte.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="./styles/js/voeux.js"></script>
</head>
<body>
	<!-- FACEBOOK & TWITTER -->
	<div class="posSocial" >
		<?php include("social-networks.php") ?>
	</div>
	
	<!-- MAIN TITLE -->
	<div class="mainTitle"><span><?php echo $titleFete; ?></span></div> 

	<!-- MUSIQUE -->
	<audio autoplay loop><source src="<?php echo $music; ?>"></audio>

	<!-- IMAGE -->
	<img class="img" src="<?php echo $img; ?>" />

	<!-- TEXTE -->
	<div class="txt">
		<!-- - TITRE DU VOEUX -->
		<span class="title"><?php echo $titleFete; ?></span>
		<br>
		<!-- - MSG DU VOEUX -->
		<span class="msg"><?php echo $leName; ?></span>
	</div>

	<!-- BAS DE PAGE : posLink -->
	<?php include("creditLink.php") ?>
</body>
</html>