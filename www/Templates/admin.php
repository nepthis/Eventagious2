    <div class="jumbotron">
      <div class="container">
        <h1>ADMINSIDA</h1>
        <p>HEJ ADMIN DU ÄR SÖT </p>
        <p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a>
        <a class="btn btn-primary btn-lg" href="index.php?action=map" role="button">Map &raquo;</a>
        <a class="btn btn-primary btn-lg" href="index.php?action=index" role="button">Register &raquo;</a>
        </p>
      </div>
    </div>
<?php
      $url = 'https://eventagious3.appspot.com/api/?get_All_users=1';
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_HTTPGET, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response_json = curl_exec($ch);
      curl_close($ch);
      $response=json_decode($response_json, true);

      echo("<div class=\"row\">");
      foreach($response as $row){
        echo("<div class=\"col-md-4\">");
        echo("<h2>Username: ".$row['username']."</h2>");
        echo("<p>E-mail: ".$row['email']."</p>");
        echo("<p>First name: ".$row['firstname']."</p>");
        echo("<p>Surname: ".$row['surname']."</p>");
        echo("<p>Section: ".$row['section']."</p>");
        echo("<p>Admin: ".$row['isAdmin']."</p>");
        echo("</div>");
    }

    

?>