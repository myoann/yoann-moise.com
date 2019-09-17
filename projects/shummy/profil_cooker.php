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
/*

    echo "First Name :{$row['First_Name']}  <br> ".
         "Last Name : {$row['Last_Name']} <br> ".
         "Email : {$row['Email']} <br> ".
         "Description : {$row['User_Description']} <br> ".
         "Email : {$row['Email']} <br> ".
         "Postal Address : {$row['User_Address']} <br> ".
         "Phone Number : {$row['Phone_Number']} <br> ".

         "Facebook : <a target=_blank href='{$row['Facebook_Account']}'>Link to Facebook Account</a> <br> "
         ; 
 */
	var user_id=getParameterByName('user_id');
	$(function(){
		if (user_id=='<?php echo $USER_ID; ?>'){
			$(location).attr('href','profil_user.php');
		}else{
	    	var _urlGetUser='./DB/DB.php?action=getUser&user_Id='+user_id;
			$.getJSON(_urlGetUser,function(value,index){
				var _data=value[0];
				console.log(_data);
				/*$(".card_bg_img").attr("src",_data.Meal_Photo);
				$(".card_title").html(_data.Title);
				$(".card_price").html("$ "+_data.Price);*/
				$("#profil_img").attr("src",_data.User_Photo);
				$("#profil_name").html(_data.First_Name+" "+_data.Last_Name);
				$("#profil_description").html(" "+_data.User_Description);
				$("#profil_phone").html("<a href='callto:"+_data.Phone_Number+"'> "+_data.Phone_Number+"</a>");
				$("#profil_email").html("<a href='mailto:"+_data.Email+"'> "+_data.Email+"</a>");
				$("#profil_adress").html(" "+_data.User_Address);
				$("#profil_fb_link").attr("href",_data.Facebook_Account);
				/*$(".card_description").find("p").html(_data.Description);
				$(".link_cooker_profil").attr("href","profil_cooker.php?user_id="+user_id);*/
			})
		}
	})
</script>
<section id="cooker">
<div id="viewMeal" class="viewCooker">
	<div class='card_meal'>
		<span id="profil_name" class="name"></span><span class="age">19 y. o.</span>
		<img class='card_img card_bg_img' src='http://bloote.com/wp-content/uploads/2015/06/Abstract-3D-Colorful.jpg'>
		<img id="profil_img" class="imgCooker" src="" />
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
			<tr><td><span id="profil_description" class="cook_info icon-bubble"></span></td></tr>
			<tr><td><span id="profil_phone" class="cook_info icon-phone"></span></td></tr>
			<tr><td><span id="profil_email" class="cook_info icon-mail-2"></span></td></tr>
			<tr><td><span id="profil_adress" class="cook_info icon-location"></span></td></tr>
			<tr>
				<td>
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5769.016373935506!2d7.279778928155813!3d43.69998704608846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1436536085355" frameborder="0" style="border:0" allowfullscreen></iframe>
				</td>
			</tr>
		</table>
	<div class="card_info card_social">
		<a href="" id="profil_fb_link" target='_blank'><span class="icon-facebook"></span></a>
		<a href="" id="profil_twitter_link" target='_blank'><span class="icon-twitter"></span></a>
		<a href="" id="profil_linkedin_link" target='_blank'><span class="icon-linkedin"></span></a>
	</div>	
	</div>	
</div>
</section>
<!-- 
==============================
		IMPORT FOOTER 
==============================
-->
<?php include("./section/_footer.php"); ?>