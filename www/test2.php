<?php


echo "Detta ar i test filen!! for API";



$url = 'https://eventagious3.appspot.com/api/?user_id_events=2';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json, true);

/*
foreach($response as $row) {
 	print_r($row['Description']);
 }*/

/*$length = sizeof($response);
echo $length;
      for ($i = 0; $i = $length; $i++) {
        //print_r($response[i]['Eventname']);
        print_r($response[i]['Description']);
        print_r($response[i]['Adress']);
        print_r($response[i]['Section']);
}*/


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


//echo "Testutskrifter";
//Detta funkar fin fint.
//print_r($response[0]['Description']);
//print_r($response[1]['Description']);

echo "Slutet på Filen";

?>