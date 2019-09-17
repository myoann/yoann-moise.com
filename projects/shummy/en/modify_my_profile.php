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
<section class="section_register modifyProfil">
  <fieldset class="form_register">
    <!-- legend>Log In</legend 
    <form name="reg" action="modify_my_profile_form_action.php" method="post" enctype="multipart/form-data">-->
    <form action="#" enctype="multipart/form-data" method="post">
      <table>
        <tr><td><center><img id="img_meals" src="" style="display:block" /></center></td></tr>
        <tr><td><input placeholder="Photo" type="file" name="file_upload" id="file_upload" accept="video/*;capture=camcorder"></td></tr>
        <tr><td><input placeholder="First name" type="text" id="user_firstName" value=""></input></td></tr>
        <tr><td><input placeholder="Last name" type="text" id="user_lastName" value=""></td></tr>
        <tr><td><input placeholder="Description" type="text" id="user_description" value=""></td></tr>
        <tr><td><input placeholder="Email" type="text" id="user_email" value=""></td></tr>
        <tr><td><input placeholder="Phone number" type="text" id="user_phone" value="" ></td></tr>
        <tr><td><input placeholder="Postal address" type="text" id="user_adress" value=""></td></tr>
        <tr><td><input placeholder="Facebook" type="text" id="user_fb_link" value=""></td></tr>
        <tr><td><button id="bt_update_profil">Update</button></td></tr>
      </table>
    </form>
  </fieldset>
</section>

<!-- 
==============================
		IMPORT FOOTER 
==============================
-->
<?php include("./section/_footer.php"); ?>