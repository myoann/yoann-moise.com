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
  buildMap();
});
</script>
<section id="div_pos">
  <div id="gmap" style="width:100%;height:600px;"></div>
</section>

<!-- 
==============================
    IMPORT FOOTER 
==============================
-->
<?php include("./section/_footer.php"); ?>