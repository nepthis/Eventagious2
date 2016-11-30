<?php


echo "Detta ar i test filen!! for API";



$url = 'https://eventagious3.appspot.com/api/?user_id_password=2';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json, true);


foreach($response as $row) {
 	echo 'row';
 	print_r($row);
 }
print_r($response['password']);

echo "Slutet på Filen";

?>