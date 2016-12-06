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
<body>
<form action="/upload_handler" method="post" enctype="multipart/form-data">
  Send these files:<p/>
  <input name="file[]" type="file" multiple="multiple"/><p/>
  <input name="EventID" type="hidden" value="12"/><p/>
  <input type="submit" value="Send files" />
</form>
</body>
</html>