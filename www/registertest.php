<?php


echo "Detta ar i test filen!! for API insert user";

$data=array(
		'id' =>15,
		'username' => 'calle',
		'email' => 'calle@kanon.se',
		'password' =>'carl',
		'firstname' => 'Carl',
		'surname' =>'Canon',
		'adress' => 'callesväg 123',
		'section' => 2,
);


$url = 'https://eventagious3.appspot.com/api/?user=1';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json, true);

echo "Slutet på Filen";

?>