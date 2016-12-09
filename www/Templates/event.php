      <div class="jumbotron">
        <div class="container">
          <h1>Browse all events currently available at Eventagious</h1>
           <div class="col-sm-3 col-md-3 ">
        		<form class="navbar-form" role="search" action="/index.php?action=event" method="post">
	        		<div class="input-group">
	            		<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
	           			<div class="input-group-btn">
	                		<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search" onclick="form.submit();"></i></button>
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
        echo("<p><a class=\"btn btn-default\" href=\"index.php?action=eventInfo&EventID=".$row['EventID']."\" role=\"button\">View details &raquo;</a></p>");
        echo("</div>");
    }

    

?>

<?php
  //Måste fixa en som tar han dom sökningen. och vi måste fixa en till funktion i API som söker på namn i event tabellen.
  ?>
        