$(function(){
  init();
});

function init(){
  var _urlGetAddress='./DB/DB.php?action=getUsers';
  $.getJSON(_urlGetAddress,function(data){
    $.each(data,function(index,value){
      console.log(value);
    })
    // $("#card_address").html(_data.Address);
  })

  // Load google map
  var map = new google.maps.Map( document.getElementById("gmap"),{
    center: new google.maps.LatLng(0,0),
    zoom: 3,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    panControl: false,
    streetViewControl: false,
    mapTypeControl: false
  });

  $('input[name=search]').click(function() {
    var geocoder = new google.maps.Geocoder(); 
    geocoder.geocode({
      address : $('input[name=search]').val(), 
      region: 'no' 
    }, function(results, status) {
      if (status.toLowerCase() == 'ok') {
        // Get center
        var coords = new google.maps.LatLng(results[0]['geometry']['location'].lat(),results[0]['geometry']['location'].lng());
        $('#coords').html('Latitute: ' + coords.lat() + '    Longitude: ' + coords.lng() );
        map.setCenter(coords);
        map.setZoom(18);
        // Set marker also
        marker = new google.maps.Marker({
          position: coords,
          map: map,
          title: $('input[name=search]').val()
        });
      }
    });
  });
}