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
var user_id = '<?php echo $USER_ID; ?>';
//alert(user_id);
$(function(){
  var _urlGetUser='./DB/DB.php?action=getUser&user_Id='+user_id;
  $.getJSON(_urlGetUser,function(value,index){
    var _data=value[0];
    //console.log(_data);
    $("#img_meals").attr("src",_data.User_Photo);
    $("#user_firstName").val(_data.First_Name);
    $("#user_lastName").val(_data.Last_Name);
    $("#user_description").val(_data.User_Description);
    $("#user_email").val(_data.Email);
    $("#user_phone").val(_data.Phone_Number);
    $("#user_adress").val(_data.User_Address);
    $("#user_fb_link").val(_data.Facebook_Account);
    //$("#user_twitter_link").attr("href",_data.Facebook_Account);
    //$("#user_linkedin_link").attr("href",_data.Facebook_Account);
  })
})
</script>
<!--img id="bg_mv_img" src="./data/bg/bg_login_1.jpg" /-->
<section class="section_params">
  <fieldset>
    <legend><h1>Parameters</h1></legend>
    <table>
      <tr><td><a href="modify_my_profile.php">Update my profile</a></td></tr>
      <tr><td><a href="modify_my_meals.php">Update a meal</a></td></tr>
      <tr><td><a href="delete_account.php" class="bt_delete_account">Delete my account</a></td></tr>
    </table>
  </fieldset>
</section>
<!-- 
==============================
		IMPORT FOOTER 
==============================
-->
<?php include("./section/_footer.php"); ?>