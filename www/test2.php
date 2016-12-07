<?php


/*
$url = 'https://eventagious3.appspot.com/api/?user_id_events=2';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json, true);
*/

?>


<html>
<head>
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="assets/js/upload_js.js"></script>

</head>

<body>
<form action="https://eventagious3.appspot.com/api/?insertImg=1" method="post" enctype="multipart/form-data" id="form" >
  Send these files:<p/>
  <input name="file" type="file" id ="file" multiple="multiple"/><p/>
  <input name="EventID" type="text" id="EventID" placeholder="EventID" value="12"/><p/>
  <input name="FileName" type="text" id="FileName" placeholder="FileName" value="file"/><p/>
  <input id= button type="submit" value="Send files" />
</form>
</body>
</html>
