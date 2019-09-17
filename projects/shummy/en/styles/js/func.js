var _url_DB="./DB/DB.php";
/*
function hideLogoMenu(){
	$("div.bg_intro").delay(3000).slideUp(200);
}*/
function viewMenu(){
	if ($("div.section__depot").is(':visible')){
		hideMenu();
	}else{
		showMenu();
	}
}
function showMenu(){
	$(".tab_profil").animate({
		right: "150px"
	},200,function(){
		$("div.section__depot").show();
	})
	//$("img#head_menu").addClass("futuriste");
}
function hideMenu(){
	$("div.section__depot").hide();
		$(".tab_profil").animate({
			right: "0px"
		},200);
	//$("img#head_menu").addClass("futuriste");
}
function seConnecter(){
	show_hide_Button("tr_signUp","tr_logIn");
}
function sInscrire(){
	alert("sInscrire");
	//show_hide_Button("tr_logIn","tr_signUp");
}
function seDeconnecter(){
	$(location).attr("href","logout.php?action=deconnexion");
}
function show_hide_Button(_bt_Show,_bt_Hide){
	if ($("tr."+_bt_Show).is(':visible')){
		$.each($("tr."+_bt_Show),function(){ $(this).hide(); });
		$.each($("tr."+_bt_Hide),function(){ $(this).show(); });
	}
    /*else{
		alert("hé ho");
	}*/
}
function ajaxPOSTLogin(_data,_messageSuccess,_messageError){
    //console.log("DATA ENVOYE");
    //console.log(_data);
	$.ajax({
		type: 'POST',
		url: _url_DB,
		data:_data,
		success:function(data){
            //console.log("DATA APRES SUCCES");
            //console.log(data);
			var _data=$.parseJSON(data);
			//console.log(_data.nbUser);
			if (_data.nbUser==1){
				alert("Hi "+_data.First_Name+" "+_data.Last_Name+"  !");
				$(location).attr("href","index.php");
			}else{
				alert(_messageError);
			}
		}
        /*,
		beforeSend:function(){
			//$("img#img").attr("src","./data/loading.gif");
		},
		complete:function(data){
			//$("img#img").fadeOut(500,function(){
				//$("img#img").attr("src",_pathIMG+$("input#user_username").val()+".png");
			//}).fadeIn();
		}*/

	})
}

function ajaxPOST(_data,_messageSuccess,_redirection){
	console.log("received : ");
	console.log(_data);
	$.ajax({
		type: 'POST',
		url: _url_DB,
		data:_data,
		success:function(data){
			console.log("ok");
			console.log(data);
			alert(_messageSuccess);
			//var _dataJSON=$.parseJSON(data);
			/*console.log("----------------------");
			console.log(data);*/
            $(location).attr("href",_redirection);
		}

	})
}

function ajaxPOSTNewMeal(_data,_messageSuccess){
	console.log("received : ");
	console.log(_data);
	$.ajax({
		type: 'POST',
		url: _url_DB,
		data:_data,
		success:function(data){
			console.log("ok");
			console.log(data);
			alert(_messageSuccess);
			$(location).attr("href","home.php");
			//var _dataJSON=$.parseJSON(data);
			/*console.log("----------------------");
			console.log(data);*/
		}
	})
}

function speak_please(_msg){
	var msg = new SpeechSynthesisUtterance(_msg);
	msg.lang = 'fr-FR';
	msg.rate  = 10;
    window.speechSynthesis.speak(msg);
}

function showShadow(_function){
	$("div.bg_shadow").attr("onclick",_function);
	$("div.bg_shadow").fadeIn();
}
function hideShadow(){
	$("div.bg_shadow").removeAttr("onclick");
	$("div.bg_shadow").fadeOut();
}

function viewFormEvent(){
	showShadow("hideFormEvent()");

	$("div.div_add_event").fadeIn();
	$("div.div_add_event").animate({
		top: "120px"
	});
}
function hideFormEvent(){
	$("div.div_add_event").animate({
		top: "-1000px"
	});
	$("div.div_add_event").fadeOut();
	hideShadow();
}


function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function createListTitleMeal(){
    var _url_getMeals='./DB/DB.php?action=getMeals';
    $.getJSON(_url_getMeals,function(data){
        var _list_title_meal="";
        $.each(data,function(index,object){
            _list_title_meal+='<option value="'+object.Title+'">';
        });
        $("#list_title_meal").html(_list_title_meal);
    });
}


function displayMeals(){
    var _url_getMeals='./DB/DB.php?action=getMeals';
    $.getJSON(_url_getMeals,function(data){
        var _cardMeal="";
        var _sectionHome=$("section#home").find("div.content");
        $.each(data,function(index,object){
            _cardMeal=build_cardMeal(object);
            _sectionHome.prepend(_cardMeal);
        });
    });
}
function getMealByTitle(){

    //alert(getParameterByName('title_meal'));
    var _url_getMeals='./DB/DB.php?action=getMealByTitle&title_meal='+getParameterByName('title_meal');
    $.getJSON(_url_getMeals,function(data){
        var _cardMeal="";
        var _sectionHome=$("section#home").find("div.content");
        $.each(data,function(index,object){
            _cardMeal=build_cardMeal(object);
            _sectionHome.append(_cardMeal);
        });
    });
}
function displayMeal(){
        console.log("ok");
    var _url_getMeals='./DB/DB.php?action=getMeal';
    $.getJSON(_url_getMeals,function(data){
        console.log(data);
    });
}
function doScroll(){
    var _scrollMenu=false;
    var _menu=$("header");
    $(window).scroll(function(){
        // si on descend de 70px via le scroll + que la width > 720 
        // console.log($(this).scrollTop());
        //if ($("body").scrollTop() > 62) {
       	if ($("body").scrollTop() > 0) {
       		/*$(".bg_img").find("img").css({
       			top: $("body").scrollTop()
       		})*/
            // scrollMenu false
            if (_scrollMenu==false){
                _scrollMenu=true;
                //console.log(_scrollMenu);
                _menu.addClass("headerScroll");
            }
        } else if (_scrollMenu==true){
            _scrollMenu=false;
            //console.log(_scrollMenu);
            _menu.removeClass("headerScroll");
        }
    });
}
function build_cardMeal(object){
   // console.log(object);
	/*var _cardMeal="<div class='card_meal'>";
	_cardMeal+="<span class='card_price'>$ "+object.price+"</span>";
	_cardMeal+="<img class='card_img card_bg_img' src='"+object.img+"' />";
	_cardMeal+="<span class='card_title'>"+object.title+" <button class='icon-plus'></button></span>";
	_cardMeal+="</div>";
	return "<a href='./profil_meal.php'>"+_cardMeal+"</a>";*/
    var _cardMeal="<div class='card_meal'>";
    _cardMeal+="<span class='card_price'>$ "+object.Price+"</span>";
    _cardMeal+="<img class='card_img card_bg_img' src='"+object.Meal_Photo+"' />";
    _cardMeal+="<span class='card_title'>"+object.Title+" <button class='icon-info'></button></span>";
    _cardMeal+="</div>";
    return "<a href='./profil_meal.php?action=getMeal&meal_id="+object.Meal_Id+"&user_id="+object.User_Id+"'>"+_cardMeal+"</a>"
}


function getWidthWindow() {
    return $(window).width();
}
function chgBG() {
    //console.log(_n);
    if (_n == 1) {

        deplaceIMG('bg_1', 0);
        deplaceIMG('bg_2', (_width));
        deplaceIMG('bg_3', (_width) * 2);
       	chgMSG("Eat what you like near you.");
    } else if (_n == 2) {
        deplaceIMG('bg_1', -(_width));
        deplaceIMG('bg_2', 0);
        deplaceIMG('bg_3', (_width));
        chgMSG("Bringing Shummy to college campuses.");

    } else if (_n == 3) {
        deplaceIMG('bg_1', -2 * (_width));
        deplaceIMG('bg_2', -(_width));
        deplaceIMG('bg_3', 0);
        chgMSG("Save time with pick up and delivery options.");
        _n = 0;

    } else {
        _n = 0;
    }
    _n++;
}

function chgMSG(_msgA) {
    $("span#slogan").fadeOut(500, function () {
        $(this).text(_msgA);
    }).fadeIn(600);
}
function deplaceIMG(_id, _width) {
    $('img#' + _id).animate({
        left: _width + "px"
    }, 1200);
}

/* ----------- UPLOAD IMG ----------- */

	// Grab the files and set them to our variable
	function prepareUpload(event)
	{
		files = event.target.files;
	}

	// Catch the form submit and upload the files
	function uploadFiles(event)
	{
        files = event.target.files;
		event.stopPropagation(); // Stop stuff happening
        event.preventDefault(); // Totally stop stuff happening

        // START A LOADING SPINNER HERE

        // Create a formdata object and add the files
		var data = new FormData();
		$.each(files, function(key, value)
		{
			data.append(key, value);
		});
        
        $.ajax({
            url: 'submit.php?files',
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
            	if(typeof data.error === 'undefined')
            	{
            		// Success so call function to process the form
            		submitForm(event, data);
            	}
            	else
            	{
            		// Handle errors here
            		console.log('ERRORS: ' + data.error);
            	}
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
            	// Handle errors here
            	console.log('ERRORS: ' + textStatus);
            	// STOP LOADING SPINNER
            }
        });
    }

    function submitForm(event, data)
	{
		// Create a jQuery object from the form
		$form = $(event.target);
		
		// Serialize the form data
		var formData = $form.serialize();

        var _src;
		
		// You should sterilise the file names
		$.each(data.files, function(key, value)
		{
			formData = formData + '&filenames[]=' + value;
		});

		$.ajax({
			url: 'submit.php',
            type: 'POST',
            data: formData,
            cache: false,
            dataType: 'json',
            success: function(data, textStatus, jqXHR)
            {
            	if(typeof data.error === 'undefined')
            	{
            		// Success so call function to process the form
            		console.log('SUCCESS: ' + data.success);
                    console.log(data.formData.filenames[0]);
                    _src=data.formData.filenames[0];
                    $("img#img_meals").attr("src",_src);
                    $("img#img_meals").slideDown();
            	}
            	else
            	{
            		// Handle errors here
            		console.log('ERRORS: ' + data.error);
            	}
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
            	// Handle errors here
            	console.log('ERRORS: ' + textStatus);
            },
            complete: function()
            {
            	// STOP LOADING SPINNER
            }
		});
	}


    
/* ----------- buildMap ----------- */
var map, geocoder, _infowindow;
function buildMap(){
    // Load google map
    map = loadMap();
    geocoder = new google.maps.Geocoder(); 

    var _urlGetAddress='./DB/DB.php?action=getMeals';
    _infowindow=new google.maps.InfoWindow({
        content:""
    });
    $.getJSON(_urlGetAddress,function(data){
      $.each(data,function(index,value){
        console.log(value);
        putMarkerAtAddress(geocoder,value); //.Address,value.Title,value.Photo
      })
      // $("#card_address").html(_data.Address);
    })

    // Try HTML5 geolocation
    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
            map.setCenter(pos);
            map.setZoom(15);
        }, function() {
            // handleNoGeolocation(true);
        });
    }
}
function loadMap(){
  var map = new google.maps.Map( document.getElementById("gmap"),{
    center: new google.maps.LatLng(0,0),
    zoom: 3,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    panControl: false,
    streetViewControl: false,
    mapTypeControl: false
  });
  return map;
}

  function putMarkerAtAddress(geocoder,_object) {
    console.log(_object);
    geocoder.geocode({
      address : _object.Address, 
      region: 'no' 
    }, function(results, status) {
      if (status.toLowerCase() == 'ok') {
        // Get center
        var coords = new google.maps.LatLng(results[0]['geometry']['location'].lat(),results[0]['geometry']['location'].lng());
        //$('#coords').html('Latitute: ' + coords.lat() + '    Longitude: ' + coords.lng() );
        //map.setCenter(coords);
        //map.setZoom(15);
        // Set marker also
        marker = put_marker(coords,map,_object);
      }
    });
  }

  function put_marker(coords,map,_object){
    var _marker= new google.maps.Marker({
      position: coords,
      map: map,
      title: _object.Title
    });
    var _contentHTML = build_cardMap(_object);
    google.maps.event.addListener(_marker,"click",function(){
        _infowindow.close();
        _infowindow.setContent(_contentHTML);
        _infowindow.open(map,_marker);
    })
    return _marker;

  }

  function build_cardMap(_object){
    var _contentHTML ="<a href='./profil_meal.php?action=getMeal&meal_id="+_object.Meal_Id+"&user_id="+_object.User_Id+"'>";
    _contentHTML+="<div class='contentMap'>";
    _contentHTML+="<img src='"+_object.Meal_Photo+"' />";
    _contentHTML+="<span class='mapTitle'>"+_object.Title+" <p class='mapPrice'>$ "+_object.Price+"</p></span>";
    _contentHTML+="</div></a>";
    return _contentHTML;
  }