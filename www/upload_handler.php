<?php
use google\appengine\api\cloud_storage\CloudStorageTools;
if($_SERVER['REQUEST_METHOD'] === 'POST'){


      //if (isset($_POST['file[]'],$_POST['EventID'])) {

		$EventID = $_POST['EventID'];

		echo $_POST['EventID'];

		$url = 'https://eventagious3.appspot.com/api/?insert_img=1';
		$header = array('Content-Type: multipart/form-data');
		
		echo $_FILES['file']['name'];
		echo $_FILES['file']['tmp_name'];

		echo $_FILES['file']['type'];

		$data = array(
			'EventID' => $EventID,
			'FileName'=>'file',
			'file' => '@'.$_FILES['file']['tmp_name'].';filename='. $_FILES['file']['name']. ';type='.$_FILES['file']['type'].'');
		 
		$resource = curl_init();
		curl_setopt($ch, CURLOPT_POST, true);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$response_json = curl_exec($ch);
    	curl_close($ch);
    	$response=json_decode($response_json, true);

		$response=json_decode($response_json, true);
		
		echo $response['status'];






}
/*
	$EventID= $_POST['EventID'];
	$bucket = CloudStorageTools::getDefaultGoogleStorageBucketName();
	$root_path = 'gs://' .$bucket. '/img/'.$EventID.'/';
 	echo $root_path;
 	echo $bucket;
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
}
 
?>
	<html>
	<body>
	<?php
	foreach($public_urls as $urls) {
	  echo '<a href="' . $urls['original'] .'"><IMG src="' . $urls['original_thumb'] .'"></a> ';
	  echo '<a href="' . $urls['grayscale'] .'"><IMG src="' . $urls['grayscale_thumb'] .'"></a>';
	  echo '<p>';
	}
	?>
	<p>
	<a href="/">Upload More</a>
	</body>
	</html>
*/
