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
<img id="bg_mv_img" src="./data/bg/bg_login_1.jpg" />
<section class="section_register">
  <fieldset class="form_register">
    <!-- legend>Log In</legend -->
    <table>
      <tr><td><a href="./"><img src="./data/logo_web_shummy_light.png" /></a></td></tr>
      <tr><td><input required type="email" placeholder="Email" id="Email" /></td></tr>
      <tr><td><input required type="password" placeholder="Password" id="Password" /></td></tr>
      <tr><td><button id="bt_logIn">Log In</button></td></tr>
    </table>
  </fieldset>
</section>

<!-- 
==============================
    IMPORT FOOTER 
==============================
-->
<?php include("./section/_footer.php"); ?>