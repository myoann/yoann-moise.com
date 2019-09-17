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


    window.onload = initiate_geolocation;
    function initiate_geolocation() {  
        navigator.geolocation.getCurrentPosition(handle_geolocation_query);  
    }  
    function handle_geolocation_query(position){
    var lng = position.coords.longitude;
    var lat = position.coords.latitude;
    alert (lng + ", " + lat);

        var mapOptions = {
          center: new google.maps.LatLng(lat, lng),
          zoom: 16
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
      }
      google.maps.event.addDomListener(window, 'load', initialize);  

    </script>


  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>