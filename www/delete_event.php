<?php 



	$url = 'https://eventagious3.appspot.com/api/?event_id=1';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPDELETE, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $responseEvent=json_decode($response_json, true);






















?>