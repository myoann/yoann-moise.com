<?php 
	$month=date("m");
	$year=date("Y");
	// tous les juillets (milieu de l'année), le nouvel an augmente +1
	if ($month>6) $year+=1;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Online Greeting Cards</title>

	<link rel="stylesheet" href="./styles/css/index.css" />

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
	<script src="./styles/js/jquery.slidingGallery-1.2.min.js"></script>
	<script src="./styles/js/index.js"></script>
</head>
<body>
	<!-- POSH -->
	<div id="posH">
		<span id="titre">Online Greeting Cards <?php echo $year ?></span>
		<span id="sous-titre">For <?php echo $year ?>, Christmas and Birthdays, create online your greeting cards.</span>
	</div>

	<!-- GALLERY -->
	<?php $path="./data/images/slider/"; ?>
	<div class="gallery">
		<img src="<?php echo $path; ?>1.jpg" onclick="infos('anniv',this)" />
		<img src="<?php echo $path; ?>2.jpg" onclick="infos('noel',this)" class="start"  />
		<img src="<?php echo $path; ?>3.jpg" onclick="infos('2014',this)" />	

		<img src="<?php echo $path; ?>1.jpg" onclick="infos('anniv',this)"  />
		<img src="<?php echo $path; ?>2.jpg" onclick="infos('noel',this)" />		    
		<img src="<?php echo $path; ?>3.jpg" onclick="infos('2014',this)" />
		
		<img src="<?php echo $path; ?>1.jpg" onclick="infos('anniv',this)"/>
		<img src="<?php echo $path; ?>2.jpg" onclick="infos('noel',this)" />
		<img src="<?php echo $path; ?>3.jpg" onclick="infos('2014',this)" />		        
	</div>

	<!-- POSB -->
	<div id="posB">
		<span id="phrase"></span><br>
		Send wishes to: <input type="text" id="name" placeholder="Nom" />
		<input type="hidden" id="evt" />
		<button onclick="openCard()">Send</button>
	</div>

	<!-- BAS DE PAGE : posLink -->
	<?php include("creditLink.php") ?>
</body>
</html>
