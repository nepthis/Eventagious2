<?php
use google\appengine\api\cloud_storage\CloudStorageTools;
if($_SERVER['REQUEST_METHOD'] === 'POST'){

      //if (isset($_POST['file[]'],$_POST['EventID'])) {
/*
		$EventID = $_POST['EventID'];

		echo $_POST['EventID'];

		$url = 'https://eventagious3.appspot.com/api/?insert_img=1';
		$header = array('Content-Type: multipart/form-data');
		$fields = array('EventID' => $EventID,'file' => '@' . $_FILES['file']['tmp_name'][0]);
		 
		$resource = curl_init();
		curl_setopt($resource, CURLOPT_URL, $url);
		curl_setopt($resource, CURLOPT_HTTPHEADER, $header);
		curl_setopt($resource, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($resource, CURLOPT_POST, 1);
		curl_setopt($resource, CURLOPT_POSTFIELDS, $fields);
		$response_json = json_decode(curl_exec($resource));
		curl_close($resource);

		$response=json_decode($response_json, true);
		print_r($response);

*/

	$bucket = CloudStorageTools::getDefaultGoogleStorageBucketName();
	$root_path = 'gs://' . $bucket . '/img/'.$EventID.'/';
 
	$public_urls = [];
	foreach($_FILES['userfile']['name'] as $idx => $name) {
	  if ($_FILES['userfile']['type'][$idx] === 'image/jpeg') {
	    $im = imagecreatefromjpeg($_FILES['userfile']['tmp_name'][$idx]);
	    imagefilter($im, IMG_FILTER_GRAYSCALE);
	    $grayscale = $root_path .  'gray/' . $name;
	    imagejpeg($im, $grayscale);
	 
	    $original = $root_path . 'original/' . $name;
	    move_uploaded_file($_FILES['userfile']['tmp_name'][$idx], $original);
	 
	    $public_urls[] = [
	        'name' => $name,
	        'original' => CloudStorageTools::getImageServingUrl($original),
	        'original_thumb' => CloudStorageTools::getImageServingUrl($original, ['size' => 75]),
	        'grayscale' => CloudStorageTools::getImageServingUrl($grayscale),
	        'grayscale_thumb' => CloudStorageTools::getImageServingUrl($grayscale, ['size' => 75]),
	    ];
	  } 
}
 
?>


    }