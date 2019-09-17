<?php
	//session_start();
	$EMAIL="Please, log in";
	$USER_ID=0;
	if (isset($_SESSION["USER_ID"]) && isset($_SESSION["EMAIL"])){
		$USER_ID=$_SESSION['USER_ID'];
		$EMAIL=$_SESSION['EMAIL'];
	}
?>
<script>
var _menu_user_id = '<?php echo $USER_ID; ?>';
//alert(_menu_user_id);
$(function(){
	var _urlGetUser='./DB/DB.php?action=getUser&user_Id='+_menu_user_id;
	$.getJSON(_urlGetUser,function(value,index){
		var _data=value[0];
		//console.log(_data);
		$("#menu_profil_img").attr("src",_data.User_Photo);
		$("#menu_profil_name").html(_data.First_Name+" "+_data.Last_Name);
		/*$("#profil_description").html(" "+_data.User_Description);
		$("#profil_phone").html("<a href='callto:"+_data.Phone_Number+"'> "+_data.Phone_Number+"</a>");
		$("#profil_email").html("<a href='mailto:"+_data.Email+"'> "+_data.Email+"</a>");
		$("#profil_adress").html(" "+_data.User_Address);
		$("#profil_fb_link").attr("href",_data.Facebook_Account);*/
		//$("#profil_twitter_link").attr("href",_data.Facebook_Account);
		//$("#profil_linkedin_link").attr("href",_data.Facebook_Account);
		/*
		$(".card_description").find("p").html(_data.Description);
		$(".link_cooker_profil").attr("href","profil_cooker.php?_menu_user_id="+_menu_user_id);
		*/
	})
})
</script>
<header>
	<?php 
		// connecté
		if (isset($_SESSION["USER_ID"]) && isset($_SESSION["EMAIL"])){ 
	?>
	<!-- LOGO TO HOMEPAGE -->
	<a href="./"><img src="./data/logo_shummy.png" /></a>

	<a id="bt_menu" class="icon-menu-2"></a>
	<a id="bt_menu_search" class="icon-search"></a>
	<!-- MENU SEARCH FILTER -->
	<div class="menu_search">
		<input id="title_meal" list="list_title_meal" type="search" placeholder="What do you want to eat ?" />
		<datalist id="list_title_meal"></datalist>
		<button id="bt_search" class="icon-arrow-right-3"></button>
		<!--button id="bt_filter" class="icon-filter-2"></button-->
	</div>
	<a id="bt_put_meal" title="Put a meal" class="icon-pencil-2" href="addmeal.php"></a>
	<?php
		}else{
	?>
	<!-- LOGO TO HOMEPAGE -->
	<a href="./"><img src="./data/logo_web_shummy.png" /></a>
	<div class="div_bt_log">
		<a href="login.php" id="bt_logIn" class="bt_signIn" data-i18n="_menu.a.bt_logIn"></a>
		<a href="signup.php" id="bt_signUp" class="bt_signIn" data-i18n="_menu.a.bt_signUp"></a>
	</div>
	<?php } ?>
</header>
<div class="div_shadow"></div>
<!-- MENU CLASSIC -->
<nav>
	<ul>
		<!--li><a href="home.php">Home</a></li-->
		<li>
			<a href="profil_user.php">
				<div class="profil_menu">
					<img class="menu_bg_img" src='http://bloote.com/wp-content/uploads/2015/06/Abstract-3D-Colorful.jpg'>
					<img id="menu_profil_img" class="profil_img" src="" />
					<span id="menu_profil_name" class="profil_name"></span>
				</div>
			</a>
		</li>
		<!--li><a href="addmeal.php">Put a meal</a></li -->
		<!--li><a href="profil_cooker.php">Cooker's profil</a></li-->
		<!--li><a href="profil_meal.php">Meal's profil</a></li-->
		<li><a href="profil_user.php"><span class="icon-user-3" data-i18n="_menu.span.bt_myProfile"></span></a></li>
		<li><a href="home.php"><span class="icon-home" data-i18n="_menu.span.bt_home"></span></a></li>
		<li><a href="map4.php"><span class="icon-location" data-i18n="_menu.span.bt_map"></span></a></li>
		<li><a href="addmeal.php"><span class="icon-upload-3" data-i18n="_menu.span.bt_postMeal"></span></a></li>
		<li><a href="parameters.php"><span class="icon-cog" data-i18n="_menu.span.bt_params"></span></a></li>
		<li><a href="logout.php"><span class="icon-exit" data-i18n="_menu.span.bt_logOut"></span></a></li>

		<!--li><a href="./">Index</a></li>
		<li><a href="login.php">Log In</a></li>
		<li><a href="signup.php">Sign Up</a></li>
		<li><a href="about.php">About</a></li>
		<li><a href="contactus.php">Contact us</a></li-->
	</ul>
</nav>