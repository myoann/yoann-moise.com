$(function(){
	init();
})

var _numIMG = 1;
var _speedSilde = 6000;
var _width = 0;
var _n = 1;
function init(){

    /* ----- hideLogoMenu ----- */
    //hideLogoMenu();
    /* ----- SEARCH ----- */
    $("input#title_meal").unbind("keypress").bind("keypress",function(e){
        var code = e.keyCode || e.which;
        if(code == 13) { //Enter keycode
            //Do something
            var _title_meal=$.trim($("#title_meal").val());
            $(location).attr("href","home.php?title_meal="+_title_meal);
        }
    });
    $("button#bt_search").unbind("click").bind("click",function(){
        var _title_meal=$.trim($("#title_meal").val());
        $(location).attr("href","home.php?title_meal="+_title_meal);
    });

    /* ----- REGISTER ----- */
    $("button#bt_signUp").unbind("click").bind("click",function(){
        //sInscrire();
        // on récupère les données envoyées :
        var _FirstName=$.trim($("#FirstName").val());
        var _LastName=$.trim($("#LastName").val());
        var _Email=$.trim($("#Email").val());
        var _Password=$.trim($("#Password").val());

        // s'ils existent et ne sont pas nul :
        if (_FirstName && _LastName && _Email && _Password){
            var _data={
                action: 'addNewUser',
                FirstName: _FirstName,
                LastName: _LastName,
                Email: _Email,
                Password: _Password
            }
            var _messageSuccess="Inscription effectuée avec succès.";
            ajaxPOST(_data,_messageSuccess,"home.php");
        }
    })
    // LOG IN
    $("button#bt_logIn").unbind("click").bind("click",function(){
        var _Email=$.trim($("#Email").val());
        var _Password=$.trim($("#Password").val());

        // s'ils existent et ne sont pas nul :
        if (_Email && _Password){
            var _data={
                action: 'loginUser',
                Email: _Email,
                Password: _Password
            }
            var _messageSuccess="Connexion effectuée avec succès.";
            ajaxPOSTLogin(_data,_messageSuccess);
        }
    });

    /* ----- UPDATE PROFIL ----- */
    $("button#bt_update_profil").unbind("click").bind("click",function(){
        //alert("ok");
        // on récupère les données envoyées :
        var _user_photo=$.trim($("#img_meals").attr("src"));
        var _user_firstName=$.trim($("#user_firstName").val());
        var _user_lastName=$.trim($("#user_lastName").val());
        var _user_description=$.trim($("#user_description").val());
        var _user_email=$.trim($("#user_email").val());
        var _user_phone=$.trim($("#user_phone").val());
        var _user_adress=$.trim($("#user_adress").val());
        var _user_fb_link=$.trim($("#user_fb_link").val());
        // s'ils existent et ne sont pas nul :
        if (_user_firstName && _user_lastName && _user_email && _user_phone){
            var _data={
                action: 'updateUser',
                UserPhoto: _user_photo,
                FirstName: _user_firstName,
                LastName: _user_lastName,
                Description: _user_description,
                Email: _user_email,
                Phone: _user_phone,
                Adress: _user_adress,
                Facebook: _user_fb_link
            }
            var _messageSuccess="Your profil was updated";
            ajaxPOST(_data,_messageSuccess,"home.php");
        }
    })


    /* ----- ADD MEAL ----- */
     $("button#bt_addMeal").unbind("click").bind("click",function(){
        //sInscrire();
        // on récupère les données envoyées :
        var _Title=$.trim($("#Title").val());
        var _Description=$.trim($("#Description").val());
        var _Price=$.trim($("#Price").val());
        var _Address=$.trim($("#Address").val());
        var _Meal_Photo = $.trim($("#img_meals").attr("src"));
        //alert(_Meal_Photo);
        // s'ils existent et ne sont pas nul :
        if (_Title && _Description && _Price && _Meal_Photo){
            var _data={
                action: 'addNewMeal',
                Title: _Title,
                Description: _Description,
                Price: _Price,
                Address: _Address,
                Meal_Photo: _Meal_Photo
            }
            var _messageSuccess="Meal was posted !";
            ajaxPOSTNewMeal(_data,_messageSuccess);
        }
    })


    /*$("#bt_signIn").unbind("click").bind("click",function(){
        $("#slogan").slideUp(500,function(){
            $("div.bg_img").slideUp(500,function(){
                //$("div.bg_img").find("img#bg_1").attr("src","./data/bg/bg_login_1.jpg");                
            }).promise().done(function(){
                $("div.bg_img").css({
                    height:900+"px"
                })
                $("div.bg_img").slideDown();
                $("div#login").slideDown();
            })
        });
    });*/


	_width = getWidthWindow();
    $('img.bg').css('width', _width);
    //console.log(_width + "px");
    chgBG();
    setInterval(function () {
        chgBG()
    }, _speedSilde);

    $(window).resize(function () {
        _width = getWidthWindow();
        $('img.bg').css('width', _width);
    })

   // var _url_getMeals='./section/json/json.json';
   $("div.div_shadow").unbind("click").bind("click",function(){
        $("nav").animate({
            left:-400+"px"
        })
        $(this).fadeOut();
   });

    $("#bt_menu").unbind("click").bind("click",function(){
        $("div.div_shadow").show();
        $("nav").animate({
            left:-2+"px"
        })
        /*if ($("nav").hasClass('menuView')){
            $(this).attr("class","icon-menu-2");
            $("nav").animate({
                left:"-300px"
            })
            $("body").animate({
                left:"0px"
            })
        }else{
            $(this).attr("class","icon-close");
            $("nav").animate({
                left:"0px"
            })
            $("body").animate({
                left:"300px"
            })
        }*/
        //$("nav").toggleClass('menuView');
        
        /*if ($("nav").is(':visible')){
            $(this).attr("class","icon-menu-2");
            $("nav").hide();
        }else{
            $(this).attr("class","icon-close");
            $("nav").show();
        }*/
    })
    var _menuSearch=$(".menu_search");
    $("#bt_menu_search").unbind("click").bind("click",function(){
        if (_menuSearch.is(':visible')){
            _menuSearch.slideUp();
        }else{
            _menuSearch.slideDown(200,function(){
                $("input#title_meal").focus();
            });
        }
    });

    doScroll();


    /* ----------- UPLOAD IMG ----------- */
    // Variable to store your files
    var files;

    // Add events
    //$('input[type=file]').on('change', prepareUpload);
    //$('form').on('submit', uploadFiles);
    $('input[type=file]').on('change', uploadFiles);

    createListTitleMeal();
}
i18n.init(function(err, t) {
  // translate nav
  $("header").i18n();

  // programatical access
  //var appName = t("app.name");
});