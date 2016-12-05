</div>
      
      <div id="footer">
      <hr>

      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


    <!-- Maps scrips -->
      <script type="text/javascript"> 
      var geocoder = new google.maps.Geocoder();
      var infowindow = new google.maps.InfoWindow();

      function initMap() 
      {
       var myLatlng = new google.maps.LatLng(65.6, 22.12);
       var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 65.617734, lng: 22.140293},
          zoom: 14
        });
       google.maps.event.addListener(map, 'click', function(event) {
        placeMarker(event.latLng);
        var myLatLng = event.latLng;
        var lat = myLatLng.lat();
        var lng = myLatLng.lng();
        var latlng = new google.maps.LatLng(lat, lng);
        infowindow.setContent("results[1].formatted_address");
        infowindow.open(map, marker);

        //Code to reverse geocode follows
         geocoder.geocode({'latLng': latlng}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
           if (results[1]) {
            map.setZoom(11);
            marker = new google.maps.Marker({
              position: latlng,
              map: map
            });
            infowindow.setContent(results[1].formatted_address);
            infowindow.open(map, marker);
            document.forms["wheregoing"]["start"].value=results[1].formatted_address;
          }
         } else {
          alert("Geocoder failed due to: " + status);
         }
        });
       });
      }    

    function placeMarker(location) 
      {
      var marker = new google.maps.Marker({
      position: location,
      map: map
   });

    map.setCenter(location);
  }
    </script>
    <body onload="initMap()">
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      /*
     function initMap() {

        var mapObject = ["Test", 65.619179, 22.138556]
        var mapObject2 = ["Test2", 65.619099, 22.141174]
        var mapObject3 = ["Test3", 65.620003, 22.149404]

        var mapCord = [mapObject,mapObject2,mapObject3];
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 65.617734, lng: 22.140293},
          zoom: 14
        });

        google.maps.event.addListener(map,'click',function(event) {
        document.getElementById('latlng').value = event.latLng.lat() + ', ' + event.latLng.lng()
          infowindow = new google.maps.InfoWindow({
            content: 'Hello, World!!'
          });
          infowindow.open(map, marker);
       })
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
        
      }
      google.maps.event.addListener(map, 'click', function( event ){
        alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() ); 
      });

      function handleLocationError(browserHasGeolocation, myMarker, pos) {
        myMarker.setPosition(pos);
        myMarker.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }

      
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqlg8Lpg9t90hUKNPE_SPJLqgUfa27ETU&callback=initMap">
    </script>
    </div>
  </body>
</html>
