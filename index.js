let map;
let service;
let infowindow;
/* this will allow php variable in the JS code I think, needs work
<script type='text/javascript'>
    document.body.onclick(function(){
        var myVariable = <?php echo(json_encode($myVariable)); ?>;
    };
</script>
*/
function initMap() {
  let location = new google.maps.LatLng(40.8462989,-74.0043587)
  map = new google.maps.Map(document.getElementById("map"), {
    center: location,
    zoom: 15,
  });
}

function changeCity(e){
  let getSelect = document.getElementById(e);
  let getLatLong = getSelect.options[getSelect.selectedIndex].value;
  getLanLong = getLatLong.split("&");
  let getLatitude = getLanLong[0];
  let getLongitude = getLanLong[1];

  let location = new google.maps.LatLng(getLatitude,getLongitude)
  infowindow = new google.maps.InfoWindow();

  map = new google.maps.Map(document.getElementById("map"), {
    center: location,
    zoom: 15,
  });

  var request = {
    location: location,
    radius: 1500,
    type: ['restaurant'],
    fields: ['name'],
  };

  service = new google.maps.places.PlacesService(map);
  service.nearbySearch(request, callback);
}

function callback(results, status) {
  $("#Table").empty();
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      if(results[i].rating >= 4.4){
        createMarker(results[i]);
        $("#Table").append(
          "<tr><td>"+results[i].name+"</td><td>"+results[i].rating+"</td></tr>"
          );
        

      }
    }
  }
}

function createMarker(place) {
  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location,
  });

  google.maps.event.addListener(marker, 'click', function(){
    infowindow.setContent(
      "<div><strong>" +
      place.name +
      "</strong><br>" +
      place.vicinity+
      "<br>"+
      "⭐"+place.rating +
      "</div>"
       
    );
    infowindow.open(map,this);
  })

  
}