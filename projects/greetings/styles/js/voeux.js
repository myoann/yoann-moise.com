$(document).ready(function(){
	$(document).bind("contextmenu",function(e){	return false; });
	
	$(".img").fadeIn(8000,function(){
		$(".txt,.posSocial").fadeIn(500);
	});
})