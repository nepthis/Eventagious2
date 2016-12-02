      <div class="jumbotron">
        <div class="container">
          <h1>Welcome to Eventagious</h1>
           <div class="col-sm-3 col-md-3 ">
        		<form class="navbar-form" role="search">
	        		<div class="input-group">
	            		<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
	           			<div class="input-group-btn">
	                		<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
	            		</div>
	        		</div>
        		</form>
        	</div>
        </div>
      </div>


      <div class="container">
      <?php
      $user_id = $_SESSION['user_id'];
      echo $user_id;
      $url = 'https://eventagious3.appspot.com/api/?get_all_events=1';
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_HTTPGET, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response_json = curl_exec($ch);
      curl_close($ch);
      $response=json_decode($response_json, true);

      echo("<div class=\"row\">");
      foreach($response as $row){
        echo("<div class=\"col-md-4\">");
        echo("<h2>".$row['Eventname']."</h2>");
        echo("<p>".$row['Description']."</p>");
        echo("<p>".$row['Adress']."</p>");
        echo("<p>".$row['Section']."</p>");
        echo("<p><a class=\"btn btn-default\" href=\"index.php?action=eventInfo\" role=\"button\">View details &raquo;</a></p>");
        echo("</div>");
    }
?>


        <!-- Example row of columns 
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
            <p><a class="btn btn-default" href="eventInfo.html" role="button">View details &raquo;</a></p>
         </div>
          <div class="col-md-4">
            <h2>Event 3</h2>
            <p>Här kommer då De eventen som man ska gå på eller som man själva har skapat. </p>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
            <p><a class="btn btn-default" href="eventInfo.html" role="button">View details &raquo;</a></p>
          </div>
        </div>-->