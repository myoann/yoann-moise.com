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
<script>
	$(function(){
		var _meal_id=getParameterByName('meal_id');
		var user_id=getParameterByName('user_id');
    	var _urlGetMeal='./DB/DB.php?action=getMeal&meal_id='+_meal_id+'&user_id='+user_id;
		$.getJSON(_urlGetMeal,function(value,index){
			var _data=value[0];
			console.log(_data);
			$(".card_bg_img").attr("src",_data.Meal_Photo);
			$(".card_title").html(_data.Title);
			$(".card_price").html("$ "+_data.Price);

			$("#profil_img").attr("src",_data.User_Photo);
			$("#profil_name").html(_data.First_Name+" "+_data.Last_Name);
			$("#profil_description").find("p").html(_data.Description);
			$("#link_cooker_profil").attr("href","profil_cooker.php?user_id="+user_id);
		})
	})
</script>
<div id="viewMeal">
	<div class='card_meal'>
		<img class='card_img card_bg_img' src=''>
		<span class='card_title'></span></span>
		<span class='card_price'></span>
	</div>
	<table>
		<tr>
			<td><a href="#" class="btn_pickUp">Pick Up</a></td>
			<td><a href="#" class="btn_delivery">Delivery</a></td>
		</tr>
	</table>
	<a id="link_cooker_profil" href="">
		<table class="tab_profil">
			<tr>
				<td><img id="profil_img" class="imgCooker" src="" /></td>
				<td><span id="profil_name" class="name"></span></td>			
			</tr>
		</table>
	</a>
	<div id="profil_description" class="card_description">
		<h2>Description</h2><br>
		<p></p>
	</div>	
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5769.016373935506!2d7.279778928155813!3d43.69998704608846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1436536085355" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<!-- 
==============================
		IMPORT FOOTER 
==============================
-->
<?php include("./section/_footer.php"); ?>