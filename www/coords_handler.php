<?php


if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$clickCoordsLat = $_POST['latitude'];
	$clickCoordsLon = $_POST['longitude'];
    $data=array(
    'longitude' => $clickCoordsLon,
    'latitude' => $clickCoordsLat
    );

    $url = 'https://eventagious3.appspot.com/api/?user=1';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response=json_decode($response_json, true);
  }
}
?>