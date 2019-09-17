<?php
	session_start();

	if (isset($_SESSION["USER_ID"]) && isset($_SESSION["EMAIL"])){
		$USER_ID=$_SESSION['USER_ID'];
		$EMAIL=$_SESSION['EMAIL'];
		header("location: home.php");
	}else{
		// on redirige l'utilisateur vers la page de connexion
		//header("location: login.php");
	}
?>
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
<span id="slogan"></span>
<div class="bg_img">
	<img id="bg_1" src="./data/bg/bg_0.jpg" class="bg" />
	<img id="bg_2" src="./data/bg/bg_1.jpg" class="bg" />
	<img id="bg_3" src="./data/bg/bg_2.jpg" class="bg" />
</div>

<section class="div_pos pos_one">
	<center><span class="title_section">REVOLUTIONIZING THE COLLEGE EATING EXPERIENCE</span></center>
	<p>We are on the mission to satisfy the crave for home cooked meals of university students who are away from home or want more diverse dining options on campus.  Shummy is the only quick and simple mobile application that allows college students to purchase home cooked meals directly from passionate and aspiring cookers on or off campus.</p>
</section>

<section class="div_pos">
	<a href="signup.php" class="bt_large_signUp bt_blue">SIGN UP NOW !</a>
</section>

<section class="div_pos">
	<img src="./data/img/EaterInfographic.png" width="100%">
	<?php include("./section/home.php"); ?>
	<a href="./home.php" id="bt_viewMore" class="bt_more"><span class="icon-search"></span> See more</a>
</section>

<section class="div_pos">
	<img src="./data/img/CookerInfographic.png" width="100%">
</section>

<section class="div_pos">
	<a href="signup.php" class="bt_large_signUp bt_red">REFER SHUMMY TO 10 FRIENDS FOR A FREE MEAL</a>
</section>

<section class="div_pos">
	<center><span class="title_section">WHAT IS SHUMMY ?</span></center>
	<table>
		<tr>
			<td><img src="./data/bg_img__1.jpg" /></td>
			<td><img src="./data/bg_img__2.jpg" /></td>
			<td><img src="./data/bg_img__3.jpg" /></td>
		</tr>
		<tr>
			<td>
				<b>OUR MISSION</b>
				<p>We are revolutionizing the college eating experience with home cooked meals on and off campus.</p>
			</td>
			<td>
				<b>HOW IT WORKS</b>
				<p>Save your time with our easy to use pick up and delivery option.  Explore and share different foods near you.</p>
			</td>
			<td>
				<b>MEET THE TEAM</b>
				<p>Bringing Shummy to you from an international perspective.</p>
			</td>
		</tr>
		<tr>
			<td><a href="ourmission.php">see more</a></td>
			<td><a href="howitworks.php">see more</a></td>
			<td><a href="meettheteam.php">see more</a></td>
		</tr>
	</table>
</section>

<!-- 
==============================
		IMPORT FOOTER 
==============================
-->
<?php include("./section/_footer.php"); ?>