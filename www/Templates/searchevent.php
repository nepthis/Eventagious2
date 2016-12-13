      <div class="jumbotron">
        <div class="container">
          <h1>Browse all events currently available at Eventagious</h1>
           <div class="col-sm-3 col-md-3 ">
          </div>
        </div>
      </div>


      <div class="container">
<?php
      //$user_id = $_SESSION['user_id'];
      //echo $user_id;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $srch=$_POST["srch-term"];
  echo($srch);
}





      echo($srch);
      $url = 'https://eventagious3.appspot.com/api/?search_event='+$srch;
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
        echo("<p>Adress: ".$row['Adress']."</p>");
        echo("<p>Section: ".$row['Section']."</p>");
        echo("<p>Date: ".$row['EventDate']."</p>");
        echo("<p><a class=\"btn btn-default\" href=\"index.php?action=eventInfo&EventID=".$row['EventID']."\" role=\"button\">View details &raquo;</a></p>");
        echo("</div>");
    }

    

?>