var _noel="- Envoyer et recevoir de jolies cartes de Noël fait partie de ces traditions plaisantes qui réchauffent la saison froide. -";
var _anniv="- Que ce soit pour un enfant, un jeune, un adulte, pour 30 ans, 40 ans, 50 ans, 60 ans, montrez à cette personne que vous pensez à elle ! -";
var _nouvelAn="- Cartes de voeux professionnelles ou alors souhaits de bonne année à vos amis et votre famille, la carte de voeux 2014 est la carte la plus envoyée de l'année ! -";
$(function() {
	$("#phrase").text(_noel);
	$("#evt").val("noel");
	$('div.gallery img').slidingGallery();
	container: $('div.gallery')

	$("#posH").fadeIn(700,function(){
		$("#posB,#posLink").fadeIn(700,function(){
			$(".gallery").fadeIn(1000);
		});
	});

	$(document).keypress(function(e) {
		// TOUCHE ENTER
	  	if (e.which==13){
			openCard();
	  	}
	})
});

function infos(_evt,_this) {
	var _height=$(_this).height();
	console.log("height : "+_height);

	var _zoom=false;
	$(".gallery").find("img").each(function(){
		if ($(this).height()>599){
			_zoom=true;
		}
	})
	console.log("zoom : "+_zoom);
	if (!_zoom){
		var _phrase="";
		if (_evt == 'anniv') {
			_phrase=_anniv;
		} else if (_evt == 'noel') {
			_phrase=_noel;
		} else { 
			_phrase=_nouvelAn;
		}
		$("#evt").val(_evt);
		$("#phrase").text(_phrase);
	}
}

function openCard(){
	if ($.trim($("#name").val())){
		var _name=$("#name").val();
		var _evt=$("#evt").val();
		window.open("voeux.php?name="+_name+"&evt="+_evt);
		return false;
	}
}
