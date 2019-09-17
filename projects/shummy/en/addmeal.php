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
<!--img id="bg_mv_img" src="http://www.dzzyn.com/wp-content/uploads/2015/06/25-Free-Creative-Minimalist-Wallpapers-That-Should-Be-on-Your-Desktop-dzzyn12.jpg" / -->
<img id="bg_mv_img" src="http://www.zastavki.com/pictures/originals/2013/Food___Cakes_and_Sweet_Berries_and_chocolate_cake_037078_.jpg" />
<section class="section_register">
<form action="#" enctype="multipart/form-data" method="post">
  <fieldset class="form_register">
    <!--legend>Sign Up</legend -->
    <table>
      <tr><td colspan=2><center><a href="./"><img src="./data/logo_web_shummy_light.png" /></a></center></td></tr>
      <!--tr>
        <td>
          <input required type="radio" name="status" id="profil_cooker" checked />
          I'm cooking ...
        </td>
        <td>
          <input required type="radio" name="status" id="profil_eater" />
          I would like to eat...
        </td>
      </tr -->
      <tr><td colspan=2><input required type="text" placeholder="Title" id="Title" value="" /></td></tr>
      <tr><td colspan=2><input required type="text" placeholder="Description" id="Description" value="" /></td></tr>
      <tr><td colspan=2><input required type="text" placeholder="Price" id="Price" value="" /></td></tr>
      <tr><td colspan=2><input required type="text" placeholder="Address" id="Address" value="" /></td></tr>
      <tr><td colspan=2><img id="img_meals" src="" /></td></tr>
      <tr><td colspan=2><input type="file" name="file_upload" id="file_upload" accept="video/*;capture=camcorder"></td></tr>
      <tr><td colspan=2><button id="bt_addMeal">Add a new meal</button></td></tr>
    </table>
  </fieldset>
  </form>
</section>

<!-- 
==============================
    IMPORT FOOTER 
==============================
-->
<?php include("./section/_footer.php"); ?>