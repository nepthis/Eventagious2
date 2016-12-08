<script type="text/javascript" src="assets/js/upload_js.js"></script>
<div class="container">
          <div id="map" style="height: 500px; width:1200px; text-align: center; padding-top: 0px;"></div>
      </div>



      <div class="container">
      </div>
    
    </div>
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var markers = [];
      var clickCoordsLat;
      var clickCoordsLon;
      var clickCoords;
      function initMap() {
        var geocoder = new google.maps.Geocoder;
        var mapObject = ["Test", 65.619179, 22.138556]
        var mapObject2 = ["Test2", 65.619099, 22.141174]
        var mapObject3 = ["Test3", 65.620003, 22.149404]
        var lastMarker;
        var mapCord = [mapObject,mapObject2,mapObject3];
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 65.617771028118, lng: 22.1387557980779},
          zoom: 14
        });
        
        google.maps.event.addListener(map, 'click', function(event) {
          //setMapOnAll(null);
          deleteMarkers();
          var lastMarker = new google.maps.Marker({
            position: event.latLng,
            map: map
          });
          clickCoordsLat = event.latLng.lat();
          clickCoordsLon = event.latLng.lng();
          clickCoords = event.latLng;
          document.getElementById('Longitude').value = clickCoordsLon;
          document.getElementById('Latitude').value = clickCoordsLat;
          markers.push(lastMarker);
          geocodeLatLng(geocoder, map);
        });
        /*
        google.maps.event.addListener(map, 'rightclick', function(event) {
          document.getElementById('points').value = event.latLng.lat();
          document.getElementById('Longitude').value = event.latLng.lng();
          document.getElementById('Latitude').value = 5;
          alert(document.getElementById('points').value);
        });*/
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
      function deleteMarkers() {
        if (markers) {
         for (i=0; i < markers.length; i++) {
              markers[i].setMap(null);
          }
      markers.length = 0;
      }
      }
      /*
      function addMarker(location) {
        var marker = new google.maps.Marker({
          position: location,
          map: map
        });
        markers.push(marker);
      }*/
      function handleLocationError(browserHasGeolocation, myMarker, pos) {
        myMarker.setPosition(pos);
        myMarker.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
      /*
      $.ajax({
        type: 'POST',
        url: 'coords_handler.php',
        data: {'longitude': clickCoordsLon},
      });
      $.ajax({
        type: 'POST',
        url: '´coords_handler.php',
        data: {'latitude': clickCoordsLat},
      });*/
    //document.forms[0].elements["Latitude"].value = getValue("latitude1");
    //document.forms[0].elements["Longitude"].value = getValue("longitude1");
    //document.getElementById('Latitude').value = 4;
    //document.getElementById('Longitude').value = 5;
    //$("#Latitude").attr("value", latitude1);
    //$("#Longitude").attr("value", longitude1);
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqlg8Lpg9t90hUKNPE_SPJLqgUfa27ETU&callback=initMap">
    </script>
<?php

		$EventID = $_GET['EventID'];
	    $user_id = $_SESSION['user_id'];

	    $url = 'https://eventagious3.appspot.com/api/?event_id='.$EventID.'';
	    $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_HTTPGET, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $response_json = curl_exec($ch);
	    curl_close($ch);
	    $response=json_decode($response_json, true);


	    foreach($response as $row){
	      	echo ("<div class=\"jumbotron\">");
      		echo ("<div class=\"container\">");
	        	//echo ("<div id=\"map\" style=\"height: 500px; width:1200px; text-align: center;\"></div>");
	        	echo ("<h1>".$row['Eventname']."</h1>");
	        	echo ("<p>Detta är en korkad test som ingen vad vad vi ska ha den till men va faN!. Heja TRUMP!.</p>");
      			echo ("</div>");
    		echo ("</div>");
    		echo ("</div>");
    		echo ("<div class=\"container\">");
    			echo("<div class=\"row\">");
	        		echo("<div class=\"col-lg-3\">");
	        			//echo("<h2>".$row['Eventname']."</h2>");
				        echo("<p>".$row['Description']."</p>");
				        echo("<p>".$row['Adress']."</p>");
				        echo("<p>".$row['EventDate']."</p>");
				        echo("<p>".$row['Section']."</p>");
	        		echo("</div>");
	        	
	    }
	    		
	    //Måste fixa så att den hämtar rätt ifrån APIn och så att den läggaer till rätt...

	   	$url = 'https://eventagious3.appspot.com/api/?eventImg='.$EventID.'';
	    $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_HTTPGET, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $response_json = curl_exec($ch);
	    curl_close($ch);
	    $response=json_decode($response_json, true);


	    foreach($response as $row){
			
	     	echo ("<img src=".$row['Image_Thumbnail_URL'].">");
		}
				echo("</div>");
		echo("</div>");
		echo ("<div class=\"container\">");
			echo ("<form method=\"post\" enctype=\"multipart/form-data\" id=\"form\" >");
	  		echo ("Send these files:<p/>");
	  		echo ("<input name=\"file\" type=\"file\" id =\"file\" multiple=\"multiple\"/><p/>");
	  		echo ("<input name=\"EventID\" type=\"text\" id=\"EventID\" placeholder=\"EventID\" value=".$EventID."><p/>");
	  		echo ("<input name=\"FileName\" type=\"text\" id=\"FileName\" placeholder=\"FileName\" value=\"file\"/><p/>");
	  		echo ("<input id= \"button\" type=\"submit\" value=\"Upload\" />");
		echo ("</div>");