<?php

    session_start();

  $mysql_hostname = "localhost";
  $mysql_user = "root";
  $mysql_password = "";
  $mysql_database = "Shummy";
  $prefix = "";
  $bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
  mysql_select_db($mysql_database, $bd) or die("Could not select database");

  $idUser=$_SESSION['USER_ID'];


  function getLat($address) {
     // Get lat and long by address         
      //$address = "51 rue Arson, 06300 Nice"; // Google HQ
      $prepAddr = str_replace(' ','+',$address);
     // $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false&key=AIzaSyCfwX9suD59bCt_uRZN8YqxmOtkahXVkxY');
      $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyALzRIi0Z-HQdWZS6XLhVBcNHHSAt5QJkc');
      $output= json_decode($geocode);
      $latitude = $output->results[0]->geometry->location->lat;
      return $latitude;
    }
    function getLong($address) {
     // Get lat and long by address         
      //$address = "51 rue Arson, 06300 Nice"; // Google HQ
      $prepAddr = str_replace(' ','+',$address);
      $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyALzRIi0Z-HQdWZS6XLhVBcNHHSAt5QJkc');
      $output= json_decode($geocode);
      $longitude = $output->results[0]->geometry->location->lng;
      return $longitude;
    }


    function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 2) {
    // Calcul de la distance en degrés
    $degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));
   
    // Conversion de la distance en degrés à l'unité choisie (kilomètres, milles ou milles nautiques)
    switch($unit) {
      case 'km':
        $distance = $degrees * 111.13384; // 1 degré = 111,13384 km, sur base du diamètre moyen de la Terre (12735 km)
        break;
      case 'mi':
        $distance = $degrees * 69.05482; // 1 degré = 69,05482 milles, sur base du diamètre moyen de la Terre (7913,1 milles)
        break;
      case 'nmi':
        $distance =  $degrees * 59.97662; // 1 degré = 59.97662 milles nautiques, sur base du diamètre moyen de la Terre (6,876.3 milles nautiques)
    }
    return round($distance, $decimals);
  }

  $WhereIAm = "24 avenue des diables bleus, nice";
  $LatWhereIAm = getLat($WhereIAm);
  $LongWhereIAm = getLong($WhereIAm);

  $nbResults = 0;
  $MealNameResults = array();
  $LatResults = array();
  $LongResults = array();


  $result = mysql_query("SELECT * FROM meal") or die(mysql_error());
  while ($row = mysql_fetch_assoc($result)) {
    $nbResults+=1;
    $MealNameMarker = $row['Title'];
    array_push($MealNameResults, $MealNameMarker);
    $LatMarker = getLat($row['address']);
    array_push($LatResults, $LatMarker);
    $LongMarker = getLong($row['address']);
    array_push($LongResults, $LongMarker);
    echo "Distance between <b>" . $WhereIAm . "</b> and <b>" . $row['address'] . "</b> : <h3>";
    echo distanceCalculation($LatWhereIAm, $LongWhereIAm, $LatMarker, $LongMarker) . " Kilometers ( " . distanceCalculation($LatWhereIAm, $LongWhereIAm, $LatMarker, $LongMarker, 'mi') . " miles ) </h3><br/>";
  }

?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas { height: 100% }
    </style>
    <!--jquery API-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>    <!--google maps API-->
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?v=3&sensor=true&key=AIzaSyALzRIi0Z-HQdWZS6XLhVBcNHHSAt5QJkc">
    </script>

    <script>
    /*function for button*/

    var nbResultsPHP = '<?php echo $nbResults; ?>';
    var latPHP = '<?php echo $LatMarker; ?>';
    var longPHP = '<?php echo $LongMarker; ?>';
    var latTablePHP = '<?php echo json_encode($LatResults); ?>';
    console.log(latTablePHP);
    var longTablePHP = '<?php echo json_encode($LongResults); ?>';
    var MealNameTablePHP = '<?php echo json_encode($MealNameResults); ?>';

  
   // alert(obj); 
 
    var locations = [
      [MealNameTablePHP[0], latTablePHP[0], longTablePHP[0], 4],
      [MealNameTablePHP[1], latTablePHP[1], longTablePHP[1], 5],
      [MealNameTablePHP[2], latTablePHP[2], longTablePHP[2], 3],
      [MealNameTablePHP[3], latTablePHP[3], longTablePHP[3], 2],
      [MealNameTablePHP[4], latTablePHP[4], longTablePHP[4], 1]
    ]; 

    window.onload = initiate_geolocation;
    function initiate_geolocation() {  
        navigator.geolocation.getCurrentPosition(handle_geolocation_query);  
    }
    function handle_geolocation_query(position){
    var lng = position.coords.longitude;
    var lat = position.coords.latitude;
    var myLatlng = new google.maps.LatLng(lat,lng);


        var mapOptions = {
          center: myLatlng,
          zoom: 16
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);

            var infowindow = new google.maps.InfoWindow();

    var marker, i;

      for (i = 0; i < locations.length; i++) {  
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][1], locations[i][2]),
          map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            infowindow.setContent(locations[i][0]);
            infowindow.open(map, marker);
          }
        })(marker, i));
        }
    }
      google.maps.event.addDomListener(window, "load", initialize);  

    </script>


  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>