<?php

	if (isset($_GET['title_meal'])){
?>
<script>getMealByTitle();</script>
<?php
	}else{
		?>
<script>displayMeals();</script>
		<?php
	}
?>
<section id="home">
	<div class="content"></div>
</section>