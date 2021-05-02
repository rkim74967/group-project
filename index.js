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


function initMap() 
{
  let location = new google.maps.LatLng(40.8462989,-74.0043587)
  map = new google.maps.Map(document.getElementById("map"), {
    center: location,
    zoom: 13,
  });
}

function changeCity(e){
  let getSelect = document.getElementById(e);
  let getLatLong = getSelect.options[getSelect.selectedIndex].value;
  getLanLong = getLatLong.split("&");
  let getLatitude = getLanLong[0];
  let getLongitude = getLanLong[1];
  let getTable = $(".table");
  console.log(getTable.hasClass("table-custom"));
  if(!getTable.hasClass("table-custom")){
    getTable.addClass('table-custom');
  }
  

  let location = new google.maps.LatLng(getLatitude,getLongitude)
  infowindow = new google.maps.InfoWindow();

  map = new google.maps.Map(document.getElementById("map"), {
    center: location,
    zoom: 14,
  });

  
  var request = {
    location: location,
    radius: 4000,
    type: ['restaurant'],
    fields: ['name'],
  };

  service = new google.maps.places.PlacesService(map);
  service.nearbySearch(request, callback);
}

function callback(results, status) {
  $("#Table").empty();
  let arry = [];
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      if(results[i].rating >= 0){
        createMarker(results[i]);
        if(results[i].name.length >= 6){
          results[i].name = results[i].name+"\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0";
        }
        arry.push(results[i])
        
        // $("#Table").append(
        //   "<tr onclick=\'showRestaurant(this)\'><td>"+results[i].name+"</td><td>"+results[i].rating+"</td></tr>"
        //   );
        
      }
     
    }
    arry.sort(function(a,b){
      return a.rating - b.rating;
    })
    arry = arry.reverse();
    for(i = 0; i < arry.length; i++){
      $("#Table").append(
        "<tr onclick=\'showRestaurant(this)\'><td>"+arry[i].name+"</td><td>"+arry[i].rating+"</td></tr>"
        );
    }
  }
}

function createMarker(place) {
  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location,
    Animation: google.maps.Animation.DROP,
    icon: 'icons/food-restaurant_3.png'
  });

  google.maps.event.addListener(marker, 'click', function(){
    infowindow.setContent(
      "<div><strong>" +
      place.name +
      "</strong><br>" +
      place.vicinity+
      "<br>"+
      "⭐ "+place.rating +
      "</div>"
    );
    infowindow.open(map,this);
  })
  

  
}

window.onclick = function(e)
    {   var id =  e.target.id;   
     if (id === 'sent')  
     { var txt = document.getElementById('example').value    
       $( "#para" ).empty().append( txt );
     }
    }

function showRestaurant(e){
  let a = $(".gm-style-iw-d");
  console.log(a);
}