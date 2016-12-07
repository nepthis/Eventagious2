<script type="text/javascript" src="assets/js/upload_js.js"></script>
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
	        	echo ("<div id=\"map\" style=\"height: 500px; width:1200px; text-align: center;\"></div>");
	        	echo ("<h1>".$row['Eventname']."</h1>");
	        	echo ("<p>Detta är en korkad test som ingen vad vad vi ska ha den till men va faN!. Heja TRUMP!.</p>");
      		echo ("</div>");
    		echo ("</div>");
    		echo ("<div class=\"container\">");

    		echo("<div class=\"row\">");
	        echo("<div class=\"col-lg-6\">");
	        echo("<h2>".$row['Eventname']."</h2>");
	        echo("<p>".$row['Description']."</p>");
	        echo("<p>".$row['Adress']."</p>");
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

	    echo ("<div class=\"col-lg-3\">");
	    foreach($response as $row){
			
	     	echo ("<img src=".$row['Image_Thumbnail_URL'].">");
		}
		echo ("</div>");
		echo ("<form method=\"post\" enctype=\"multipart/form-data\" id=\"form\" >");
  		echo ("Send these files:<p/>");
  		echo ("<input name=\"file\" type=\"file\" id =\"file\" multiple=\"multiple\"/><p/>");
  		echo ("<input name=\"EventID\" type=\"text\" id=\"EventID\" placeholder=\"EventID\" value=".$EventID."><p/>");
  		echo ("<input name=\"FileName\" type=\"text\" id=\"FileName\" placeholder=\"FileName\" value=\"file\"/><p/>");
  		echo ("<input id= \"button\" type=\"submit\" value=\"Send files\" />");


		echo ("</div>");