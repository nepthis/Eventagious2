      <div class="container">
          <div id="map" style="height: 500px; width:1200px; text-align: center; "></div>
      </div>

      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-4">
            <h2>Event 1</h2>
            <p>Här kommer då De eventen som man ska gå på eller som man själva har skapat. </p>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
            <p><a class="btn btn-default" href="index.php?action=eventInfo" role="button">View details &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h2>Event 2</h2>
            <p>Här kommer då De eventen som man ska gå på eller som man själva har skapat. </p>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
            <p><a class="btn btn-default" href="index.php?action=eventInfo" role="button">View details &raquo;</a></p>
         </div>
          <div class="col-md-4">
            <h2>Event 3</h2>
            <p>Här kommer då De eventen som man ska gå på eller som man själva har skapat. </p>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
            <p><a class="btn btn-default" href="index.php?action=eventInfo" role="button">View details &raquo;</a></p>
          </div>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


    <!-- Maps scrips -->

    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var markers = [];
      var allMarkers = [];
      function initMap() {
        var geocoder = new google.maps.Geocoder;
        var mapObject = ["Test", 65.619179, 22.138556]
        var mapObject2 = ["Test2", 65.619099, 22.141174]
        var mapObject3 = ["Test3", 65.620003, 22.149404]
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 65.617771028118, lng: 22.1387557980779},
          zoom: 14
        });
        var mapCord = [mapObject,mapObject2,mapObject3];
        
        for (var i = mapCord.length - 1; i >= 0; i--) {
          var marker = new google.maps.Marker({
          position: new google.maps.LatLng(mapCord[i][1], mapCord[i][2]),
          map: map,
          title: mapCord[i][0]
          });
        }

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            //Marker for you position
      
      var myMarker = new google.maps.Marker({
            position: pos,
            map: map,
            title: 'My position'
          });
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, myMarker, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, myMarker, map.getCenter());
        }
        $.getJSON( "https://eventagious3.appspot.com/api/?get_all_event_location=1", function( data ) {
        alert(data[0].Longitude);
        alert(data[4].Latitude);
        alert(data[3].Eventname);
        for (var i = data.length - 1; i >= 0; i--) {
          console.log(data.length);
          console.log(data[i][0]);
          console.log(data[i][1]);
          console.log(data[i][2]);
          allMarkers[i] = new google.maps.Marker({
          position: new google.maps.LatLng(data[i][0], data[i][1]),
          map: map,
          title: data[i][2]
          });
          allMarkers[i].index = i;
        }
      });
        
      }
      function geocodeLatLng(geocoder, map) {
        var clickCoords = {lat: parseFloat(clickCoordsLat), lng: parseFloat(clickCoordsLon)};
        geocoder.geocode({'location': clickCoords}, function(results, status) {
          if (status === 'OK') {
            if (results[1]) {
              console.log(results[1].formatted_address);
              document.getElementById('Adress').value = results[1].formatted_address;
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
      }
      function handleLocationError(browserHasGeolocation, myMarker, pos) {
        myMarker.setPosition(pos);
        myMarker.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
      //data.latitude
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqlg8Lpg9t90hUKNPE_SPJLqgUfa27ETU&callback=initMap">
    </script>
  </div>